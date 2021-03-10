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
            <article class="hide">
                <aside>
                    <img src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                </aside>     
                <main>
                    <header> 
                        <h2>Time for a Quizr</h2>
                    </header> 
                    <section>
                        <p>You will be shown some multiple choice questions</p>
                        <p>Choose your answer and then move on.</p>    
                        <p>You can move backwards and forwards amongst the questions before submitting your answers at the end</p>
                    </section>    
                </main>
            </article>

            <?php foreach( $questions as $index => $q ){ ?>
                <article class="hide">
                    <aside>
                        <img src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                    </aside>     
                    <main>
                        <header>      
                            <h2>Question <?php echo $index + 1; ?></h2>                            
                        </header>
                        <section>
                        
                            <h3><?php echo $q->post_title; ?></h3>            

                            <?php echo apply_filters( 'the_content', $q->post_content ); ?>

                            <?php $answers = $quizr_answers_table->index( $q->ID );  ?>

                            <div class="quizr-shortcode-question-set__answer-container">
                                <?php foreach( $answers as $index => $value ) { ?>
                                    <div>
                                        <input 
                                            type="checkbox" 
                                            name="quizr_question_answer[<?php echo $index; ?>][is_correct]"
                                            value="" 
                                        />
                                        <label><?php echo $value->description; ?></label>
                                    </div>                      
                                <?php } ?>
                            </div>                            
                        </section>
                    </main>
                </article>
            <?php } ?>
            <div class="quizr-shortcode-question-set__arrows">
                <a class="quizr-shortcode-question-set__arrows__prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="quizr-shortcode-question-set__arrows__next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <ul class="quizr-shortcode-question-set__pips">
                <li class="quizr-shortcode-question-set__pips__pip active">&#8226;</li>
                <?php foreach( $questions as $index => $q ){ ?>
                    <li class="quizr-shortcode-question-set__pips__pip">&#8226;</li>
                <?php } ?>
            </ul>
        </div>

        <?php

        return ob_get_clean(); 
    }

    public function display_quiz(  )
    {
        add_shortcode( 'quizr_question_set', array( $this, 'render_html' ) );        
    }
}