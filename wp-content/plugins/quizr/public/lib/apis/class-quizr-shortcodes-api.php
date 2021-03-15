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

        <div class="quizr-qs"> 
            <div class="quizr-qs-intro quizr-qs--hide quizr-qs--show">
                <article class="quizr-qs-card"> 
                    <div class="quizr-qs-card__container">
                        <aside class="quizr-qs-card__sidebar">
                            <img class="quizr-qs-card__img" src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                        </aside>   
                        <div class="quizr-qs-card__content">
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
                            </section>    
                        </div>
                        <div class="quizr-qs-card__answers">
                            <div class="quizr-qs-card__answer-label">
                                <p>When you hover over the card, the answers are revealed here!</p>
                            </div>
                        </div>
                    </div>
                    <a class="quizr-qs-intro__start-quiz" href="">START QUIZ</a>
                </article>
            </div>
            <form name="quizr-qs-form">                
                <div class="quizr-qs-questions quizr-qs--hide">     
                    <?php foreach( $questions as $index => $q ){ ?>                                        
                        <article class="quizr-qs-card quizr-qs--hide quizr-qs--show">
                            <div class="quizr-qs-card__container">
                                <aside class="quizr-qs-card__sidebar">
                                    <img class="quizr-qs-card__img" src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                                </aside>     
                                <div class="quizr-qs-card__content">
                                    <header>      
                                        <h2>Question <?php echo $index + 1; ?></h2>                            
                                    </header>
                                    <section>
                                    
                                        <h3><?php echo $q->post_title; ?></h3>            

                                        <?php echo apply_filters( 'the_content', $q->post_content ); ?>
                                                    
                                    </section>
                                </div>
                                <?php $answers = $quizr_answers_table->index( $q->ID );  ?>
                                <div class="quizr-qs-card__answers">                                
                                    <?php foreach( $answers as $value ) { ?>
                                        <div>                                            
                                            <label class="quizr-qs-card__answer-label">
                                                <input
                                                type="radio" 
                                                name="quizr_question_id|<?php echo $q->ID; ?>"
                                                value="<?php echo esc_html( $value->id ) . '|'.  esc_html( $value->description ) . '|' . esc_html( $q->post_title ); ?>" 
                                            />
                                                <?php echo $value->description; ?>
                                            </label>
                                        </div>                              
                                    <?php } ?>                                
                                </div>    
                            </div>               
                        </article>                     
                        
                    <?php } ?>
                </div>
                    
            </form>
                
            <div class="quizr-qs-summary">
                <article class="quizr-qs__summary quizr-qs--hide"> 
                    
                </article>
            </div>
                
            <div class="quizr-qs__arrows quizr-qs--hide">
                <a class="quizr-qs__arrows__prev quizr-qs__flex--hide">&#10094;</a>
                <a class="quizr-qs__arrows__next quizr-qs__flex--hide">&#10095;</a>
            </div>
            <ul class="quizr-qs__pips quizr-qs__flex--hide">
                <?php foreach( $questions as $index => $q ){ ?>
                    <li class="quizr-qs__pips__pip"><a class="quizr-qs__pip-a" href="#">&#8226;</a></li>
                <?php } ?>
                <li class="quizr-qs__pips__pip"><a class="quizr-qs__pip-a" href="#">&#8226;</a></li>
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