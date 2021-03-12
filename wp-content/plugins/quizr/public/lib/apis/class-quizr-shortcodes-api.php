<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Shortcodes_Api {

    public function render_html( $atts, $content = null ){

        $a = shortcode_atts( array(
            'id' => -1
        ), $atts );

        $question_set = get_post( (int) $a['id']);

        print_r( $question_set->post_title );

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
            <div class="quizr-shortcode-question-set__intro hide show">
                <article class="hide show"> 
                    <aside>
                        <img src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                    </aside> 
                    <main>
                        <header> 
                            <h2>Time for a Quizr</h2>
                        </header> 
                        <section>
                            <h3>Subject: <?php echo $question_set->post_title; ?></h3>
                            <p>You will be shown some multiple choice questions</p>  
                            <ul>
                                <li>You can move backwards and forwards amongst the questions</li>
                                <li>At the end you will see a summary of your answers</li>
                                <li>After submitting your answers, you will get your score</li>
                            </ul>
                            <a class="quizr-shortcode-question-set__intro__start-quiz" href="">START QUIZ</a>
                        </section>    
                    </main>
                </article>
            </div>
            <div class="quizr-shortcode-question-set__questions hide">
                <?php foreach( $questions as $index => $q ){ ?>
                    <article class="hide show">
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
                                    <?php foreach( $answers as $value ) { ?>
                                        <div>
                                            <input 
                                                type="radio" 
                                                name="quizr_question_chosen_answer[<?php echo $index; ?>]"
                                                value="" 
                                            />
                                            <label><?php echo $value->description; ?></label>
                                        </div>                      
                                    <?php } ?>
                                </div>                            
                            </section>
                            <footer>
                                
                            </footer>
                        </main>
                    </article>
                <?php } ?>
                <div class="quizr-shortcode-question-set__arrows">
                    <a class="quizr-shortcode-question-set__arrows__prev hide">&#10094;</a>
                    <a class="quizr-shortcode-question-set__arrows__next hide show">&#10095;</a>
                </div>
                <ul class="quizr-shortcode-question-set__pips">
                    <?php foreach( $questions as $index => $q ){ ?>
                        <li class="quizr-shortcode-question-set__pips__pip"><a href="#">&#8226;</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <?php

        return ob_get_clean(); 
    }

    public function display_quiz(  )
    {
        add_shortcode( 'quizr_question_set', array( $this, 'render_html' ) );        
    }
}