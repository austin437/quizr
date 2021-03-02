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
        $meta_value = get_post_meta( $post->ID, 'quizr_question_set_id', true );

        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'admin/partials/quizr-admin-cpt-question-question-set-meta-box.php';       
    }   


    public function render_answers_metabox( $post )
    {        
        $quizr_answers_table = new Quizr_Answers_Table();
        $answers = $quizr_answers_table->index( $post->ID );

        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'admin/partials/quizr-admin-cpt-question-answer-meta-box.php';        
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

            $where = array( 'quizr_question_id' => $id );
            $where_format = array( '%d' );
            $this->quizr_Answers_Table->delete( $where, $where_format );
            
            foreach( $post_data['quizr_question_answer'] as $answer ){
                if( strlen( $answer['description'] ) > 0 ){
                    $values_to_be_inserted = array(
                        'quizr_question_id' => $id,
                        'description' => $answer['description'],
                        'is_correct' => array_key_exists( 'is_correct', $answer ) ? '1' : '0'
                    );

                    $this->quizr_Answers_Table->insert( $values_to_be_inserted );
                }                
            }          
        }

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