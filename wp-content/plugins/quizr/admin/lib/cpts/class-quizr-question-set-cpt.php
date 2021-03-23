<?php

if ( ! defined( 'ABSPATH' ) ) exit;

class Quizr_Question_Set_Cpt {

    const CPT_NAME = 'quizr_question_set';

    public function register_custom_post_type_quizr_question_set()
    {
        register_post_type( static::CPT_NAME,
            array(
                'labels'      => array(
                    'name'          => __('Quizr Question Sets', 'textdomain'),
                    'singular_name' => __('Quizr Question Set', 'textdomain'),
                ),
                'public'      => true,
                'has_archive' => true,
                'supports' => array('title','thumbnail'),
            )
        );
    }

    public function add_meta_boxes()
    {
        add_meta_box(
            'quizr-questions',
            __( 'Questions', 'quizr' ),
            array( $this, 'render_questions_metabox' ),
            static::CPT_NAME,
            'advanced',
            'default'
        );
    }

    public function render_questions_metabox( $post ) {
        
        $post_id = $post->ID;

        $questions = get_posts( 
            array( 
                'post_type' => 'quizr_question',
                'meta_key' => 'quizr_question_set_id',
                'meta_value' => (int) $post->ID,
            ) 
        );

        require_once plugin_dir_path( dirname( __DIR__ ) ) . 'partials/quizr-admin-cpt-question-set-question-meta-box.php';       
    }

    public function check_answers( $question_set_id, $answer_data ){   

            $quizr_answers_table = new Quizr_Answers_Table();

            $questions = get_posts( 
                array( 
                    'post_type' => 'quizr_question',
                    'meta_key' => 'quizr_question_set_id',
                    'meta_value' => (int) $question_set_id,
                ) 
            );

            $return_data = [];            

            foreach( $answer_data as $key => $value ) {

                $question = $questions[ array_search( $value['question_id'], array_column( $questions, 'ID' ) ) ];
                $return_data[$key]['question'] = $question->post_title;                
                $return_data[$key]['content'] = $question->post_content;  
                $return_data[$key]['given_answer'] = 'Not supplied';
                $return_data[$key]['correct_answer'] = 'n/a';
                $return_data[$key]['was_correct'] = false;

                $answers = $quizr_answers_table->index( $question->ID );

                // error_log( "Answers: " . print_r( $answers, true ), 3, LOG_PATH );

                $answer_id = -1;
                $answer_description = 'No answer given';

                $correct_answer = array_values( array_filter( $answers, function($item) use($question) {
                    return (int) $item->is_correct === 1;
                }));

                if( count( $correct_answer ) > 0 )
                {
                    $answer_id = $correct_answer[0]->id;
                    $answer_description = $correct_answer[0]->description;
                }

                $return_data[$key]['correct_answer'] = $answer_description;

                if( array_key_exists( 'answer_id', $value ) )
                {
                    $given_answer = $answers[ array_search( $value['answer_id'], array_column( $answers, 'id' ) ) ];
                    $return_data[$key]['given_answer'] = $given_answer->description;
                    $return_data[$key]['was_correct'] = (int) $given_answer->id === (int) $answer_id;
                }                 

             
                            

            }

            return $return_data;
      

    }

}