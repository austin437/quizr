<?php

class Quizr_Question_Cpt {

    const CPT_NAME = 'quizr_question';

    private $quizr_Answers_Table;

    public function __construct( Quizr_Answers_Table $quizr_Answers_Table)
    {
        $this->quizr_Answers_Table = $quizr_Answers_Table;
    }

    public function add_meta_boxes()
    {
        add_meta_box(
            'quizr-question-set',
            __( 'Question Set', 'textdomain' ),
            array( $this, 'render_question_set_metabox' ),
            static::CPT_NAME,
            'side',
            'default'
        );

        add_meta_box(
            'quizr-answers',
            __( 'Answers', 'textdomain' ),
            array( $this, 'render_answers_metabox' ),
            static::CPT_NAME,
            'advanced',
            'default'
        );
    }

    public function render_question_set_metabox( $post ) 
    {

        $question_sets = get_posts( array( 'post_type' => 'quizr_question_set' ) );

        wp_nonce_field( 'quizr_question_set_id_nonce', 'quizr_question_set_id_nonce_' . $post->ID );

        $meta_value = get_post_meta( $post->ID, 'quizr_question_set_id', true );

        ?>
            <select id="quizr_question_set_id" name="quizr_question_set_id" class="widefat">
                <option value="" ></option>
                <?php foreach( $question_sets as $qs ) { ?>
                    <option 
                        value="<?php echo esc_html($qs->ID); ?>" 
                        <?php echo (int) $qs->ID === (int) $meta_value ? 'selected="selected"' : ''; ?> 
                    ><?php echo esc_html($qs->post_title); ?></option>
                <?php } ?>
            </select>  
        <?php
    }

    public function render_answers_metabox( $post )
    {        
        $quizr_answers_table = new Quizr_Answers_Table();
        $answers = $quizr_answers_table->index( $post->ID );

        ?>
            <div id="quizr-admin-answer-container" data-post-id="<?php echo esc_html( $post->ID ); ?>">
                <form>
                    <table class="widefat">
                        <thead>
                            <tr>
                                <th >Description</th>
                                <th width="10%">Correct</th>
                                <th width="15%">Action</th>                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach( $answers as $index => $value ) { ?>
                            <tr>
                                <td>
                                    <input name="quizr_question_answer[<?php echo $index; ?>][id]" type="hidden" value="<?php echo $value->id; ?>" />
                                    <input name="quizr_question_answer[<?php echo $index; ?>][description]" class="widefat" value="<?php echo $value->description; ?>" type="text" readonly/>
                                </td>
                                <td>
                                    <input 
                                        type="checkbox" 
                                        name="quizr_question_answer[<?php echo $index; ?>][is_correct]"
                                        value="" 
                                        readonly
                                        <?php checked( (int) $value->is_correct === 1 ); ?> 
                                    />
                                </td>
                                <td class="column-columnname">
                                    <div >
                                        <span><a class="quizr_answer_edit"  href="#">Edit</a> |</span>
                                        <span><a class="quizr_answer_delete" data-index="<?php echo $index; ?>" href="#">Delete</a></span>
                                    </div>
                                </td>
                            </tr>                         
                            <?php } ?>
                            <tr>        
                                <td >
                                    <input name="quizr_question_answer[<?php echo $index + 1; ?>][id]" type="hidden" value="-1" />
                                    <input name="quizr_question_answer[<?php echo $index + 1; ?>][description]" class="widefat" value="" type="text"/>
                                </td>
                                <td><input type="checkbox" name="quizr_question_answer[<?php echo $index + 1; ?>][is_correct]" value=""  /></td>
                                <td class="column-columnname"></td>
                            </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        <?php
    }

    function save_custom_meta_data($id) 
    {

        global $post; 

        if( ! is_object( $post ) ) return; 

        if ( $post->post_type !== static::CPT_NAME ) return;

        $post_data = sanitize_post( $_POST );      

        check_admin_referer( 'quizr_question_set_id_nonce', 'quizr_question_set_id_nonce_' . $id );

        if( array_key_exists('quizr_question_set_id', $post_data) ) update_post_meta($id, 'quizr_question_set_id', $post_data['quizr_question_set_id']);        

        if( array_key_exists('quizr_question_answer', $post_data) && is_array($post_data['quizr_question_answer'])){
            
            foreach( $post_data['quizr_question_answer'] as $answer ){
                $values_to_be_inserted = array(
                    'quizr_question_id' => $id,
                    'description' => $answer['description'],
                    'is_correct' => array_key_exists( 'is_correct', $answer ) ? '1' : '0'
                );

                $this->quizr_Answers_Table->insert( $values_to_be_inserted );
            }          
        }

        var_dump( $post_data ); die();

        /**
         * Add answers...
         */

    }


    public function register_custom_post_type_quizr_question()
    {
        register_post_type( static::CPT_NAME,
            array(
                'labels'      => array(
                    'name'          => __('Questions', 'textdomain'),
                    'singular_name' => __('Question', 'textdomain'),
                ),
                    'public'      => true,
                    'has_archive' => true,
            )
        );
    }
}