<?php

/**
 * @object $question_set
 * @array $questions
 * @object quizr_answers_table
 */

?>

<div class="quizr-qs quizr-qs--hide quizr-qs--show " data-question-set-id="<?php echo $qs_id; ?>">         
    <div class="lds-spinner-container lds-spinner--hide">
        <div class="lds-spinner">
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
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
    <form class="quizr-form" data-id="<?php echo $qs_id; ?>">   
        <div class="quizr-qs-questions quizr-qs--hide">                      
            <?php foreach( $questions as $key => $q ){ ?>                                                            
                <article class="quizr-qs-card quizr-qs--hide">
                    <div class="quizr-qs-card__container">
                        <aside class="quizr-qs-card__sidebar">
                            <img class="quizr-qs-card__img" src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                        </aside>     
                        <div class="quizr-qs-card__content">
                            <header>      
                                <h2>Question <?php echo $key + 1; ?></h2>                            
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
                                        <input type="hidden" name="quizr_question[<?php echo $key; ?>][question_id]" 
                                        value="<?php echo esc_html( $q->ID ); ?>" /> 
                                    <label class="quizr-qs-card__answer-label">
                                        <input
                                        type="radio" 
                                        name="quizr_question[<?php echo $key; ?>][answer_id]"
                                        value="<?php echo esc_html( $value->id ); ?>" 
                                    />
                                    <?php echo $value->description; ?>
                                    </label>
                                </div>                              
                            <?php } ?>                                
                        </div>    
                    </div>          
                        
                </article>                       
            <?php } ?>
            
            <article class="quizr-qs-card quizr-qs--hide"> 
                <div class="quizr-qs-card__container">
                    <aside class="quizr-qs-card__sidebar">
                        <img class="quizr-qs-card__img" src="https://www.quizzer.dev.cc/wp-content/plugins/quizr/public/img/quizr-logo.png" />   
                    </aside>   
                    <div class="quizr-qs-card__content">
                        <header> 
                            <h2>Submit Quiz</h2>
                        </header> 
                        <section>
                            <h3>Submit your quiz when you are ready</h3>  
                            <p>You can retake it afterwards</p>                              
                        </section>    
                    </div>
                    <div class="quizr-qs-card__answers">
                        <div class="quizr-qs-card__answer-label">
                            <p>You can go back and change your answers before submitting</p>  
                        </div>
                    </div>                      
                </div>
                <a class="quizr-qs-results__submit-quiz" href="">SUBMIT QUIZ</a>
            </article>
        </div>        
    </form>          
    <div class="quizr-qs-arrows quizr-qs--hide">
        <a class="quizr-qs-arrows__prev quizr-qs__flex--hide">&#10094;</a>
        <a class="quizr-qs-arrows__next quizr-qs__flex--hide">&#10095;</a>
    </div>
    <ul class="quizr-qs__pips quizr-qs__flex--hide">
        <?php foreach( $questions as $q ){ ?>
            <li class="quizr-qs__pips__pip"><a class="quizr-qs__pip-a" href="#">&#8226;</a></li>
        <?php } ?>
        <li class="quizr-qs__pips__pip"><a class="quizr-qs__pip-a" href="#">&#8226;</a></li>
    </ul>
</div>
<div class="quizr-qs-results quizr-qs--hide"></div>