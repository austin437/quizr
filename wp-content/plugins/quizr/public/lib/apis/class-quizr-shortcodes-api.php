<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Shortcodes_Api {

    public function render_html( $atts, $content = null ){

        $a = shortcode_atts( array(
            'id' => -1
        ), $atts );

        $questions = get_posts( array(
            'post_type' => 'quizr_question',
            'numberposts' => -1,
            'meta_key' => 'quizr_question_set_id',
            'meta_value' => (int) $a['id']
        ) );

        $quizr_answers_table = new Quizr_Answers_Table();          

        ob_start();
       
        ?>

        <div class="quizr-shortcode-question-set">
            <section>
                <h2>Quizr Question Set</h2>
                <p>Choose 1 answer per question and enjoy!</p>            
            </section>

            <?php foreach( $questions as $q ){ ?>

                <section>
                
                    <h2><?php echo $q->post_title; ?></h2>            

                    <?php echo apply_filters( 'the_content', $q->post_content ); ?>

                    <?php $answers = $quizr_answers_table->index( $q->ID );  ?>

                    <table>
                        <tbody>
                        <?php foreach( $answers as $index => $value ) { ?>
                            <tr>
                                <td><input 
                                        type="checkbox" 
                                        name="quizr_question_answer[<?php echo $index; ?>][is_correct]"
                                        value="" 
                                    />
                                    <label><?php echo $value->description; ?></label>
                                </td>                        
                            </tr>                         
                        <?php } ?>
                        </tbody>
                    </table>

                    <hr />

                </section>

            <?php } ?>

        </div>

        <?php

        return ob_get_clean(); 
    }

    public function display_quiz(  )
    {
        add_shortcode( 'quizr_question_set', array( $this, 'render_html' ) );        
    }
}