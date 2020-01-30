<?php

use App\Models\Question;
use App\Models\Quiz;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class QuizTableSeeder extends Seeder
{
    protected $data = [
        [
            'name' => 'Most Common General Knowledge Quiz In India',
            'question_size' => 10,
            'type' => 'multiple',
            'questions' => [
                [
                    'question' => 'Nobel prize is awarded for which of the following disciplines:',
                    'right_answer' => 4,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Literature, peace and economics',
                        ], [
                            'key' => 2,
                            'value' => 'Medicine or Physiology',
                        ], [
                            'key' => 3,
                            'value' => 'Chemistry and Physics',
                        ], [
                            'key' => 4,
                            'value' => 'All the above',
                        ],
                    ]
                ], [
                    'question' => 'Garampani Sanctuary is locate in which of the following places:',
                    'right_answer' => 3,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Junagarh, Gujarat',
                        ], [
                            'key' => 2,
                            'value' => 'Kohima, Nagaland',
                        ], [
                            'key' => 3,
                            'value' => 'Diphu, Assam',
                        ], [
                            'key' => 4,
                            'value' => 'Gangtok, Sikkim',
                        ],
                    ]
                ], [
                    'question' => 'Entomology studies what?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Behavior of human beings',
                        ], [
                            'key' => 2,
                            'value' => 'Insects',
                        ], [
                            'key' => 3,
                            'value' => 'The origin and history of technical and scientific terms',
                        ], [
                            'key' => 4,
                            'value' => 'The formation of rocks',
                        ],
                    ]
                ], [
                    'question' => 'Galileo was an astronomer who',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'developed the telescope',
                        ], [
                            'key' => 2,
                            'value' => 'discovered four satellites of Jupiter',
                        ], [
                            'key' => 3,
                            'value' => 'discovered that the movement of pendulum produces a regular time measurement',
                        ], [
                            'key' => 4,
                            'value' => 'All the above.',
                        ],
                    ]
                ], [
                    'question' => 'Sun exposure can bring about an improvement in health because of which of the following reasons:',
                    'right_answer' => 4,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'the infrared light kills bacteria in the body',
                        ], [
                            'key' => 2,
                            'value' => 'resistance power increases',
                        ], [
                            'key' => 3,
                            'value' => 'the pigment cells in the skin get stimulated and produce a healthy tan',
                        ], [
                            'key' => 4,
                            'value' => 'the ultraviolet rays convert skin oil into Vitamin D',
                        ],
                    ]
                ], [
                    'question' => 'Who is the father of geometry?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Aristotle',
                        ], [
                            'key' => 2,
                            'value' => 'Euclid',
                        ], [
                            'key' => 3,
                            'value' => 'Pythagoras',
                        ], [
                            'key' => 4,
                            'value' => 'Kepler',
                        ],
                    ]
                ], [
                    'question' => 'Indian player Jude Felix is popular for which sports?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Volleyball',
                        ], [
                            'key' => 2,
                            'value' => 'Football',
                        ], [
                            'key' => 3,
                            'value' => 'Hockey',
                        ], [
                            'key' => 4,
                            'value' => 'Tennis',
                        ],
                    ]
                ], [
                    'question' => 'The Indian, who holds the pride of beating the computers in mathematical wizard is:',
                    'right_answer' => 1,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Shakuntala Devi',
                        ], [
                            'key' => 2,
                            'value' => 'Raja Ramanna',
                        ], [
                            'key' => 3,
                            'value' => 'Ramanujam',
                        ], [
                            'key' => 4,
                            'value' => 'Rina Panigrahi',
                        ],
                    ]
                ], [
                    'question' => 'Who is popularly called as the Iron Man of India?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Subhash Chandra Bose',
                        ], [
                            'key' => 2,
                            'value' => 'Sardar Vallabhbhai Patel',
                        ], [
                            'key' => 3,
                            'value' => 'Jawaharlal Nehru',
                        ], [
                            'key' => 4,
                            'value' => 'Govind Ballabh Pant',
                        ],
                    ]
                ], [
                    'question' => 'Guru Gopi Krishna is popular for which form of Indian dance?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Bharatanatyam',
                        ], [
                            'key' => 2,
                            'value' => 'Kuchipudi',
                        ], [
                            'key' => 3,
                            'value' => 'Kathak',
                        ], [
                            'key' => 4,
                            'value' => 'Manipuri',
                        ],
                    ]
                ],
            ],
        ], [
            'name' => 'Binary quiz',
            'question_size' => 10,
            'questions' => [
                [
                    'question' => '40 is a 00101000?',
                    'right_answer' => 1,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '63 is a 10000000?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '78 is a 01101001?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '90 is a 01011010?',
                    'right_answer' => 1,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '105 is a 01101001?',
                    'right_answer' => 1,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '128 is a 00111111?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '30 is a 00101000?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '55 is a 00011110?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '63 is a 00111111?',
                    'right_answer' => 1,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ], [
                    'question' => '310 is a 00101000?',
                    'right_answer' => 2,
                    'answers' => [
                        [
                            'key' => 1,
                            'value' => 'Yes',
                        ], [
                            'key' => 2,
                            'value' => 'No',
                        ]
                    ]
                ],
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Quiz::count()) {
            foreach ($this->data as $data) {
                $quiz = tap(Quiz::create(Arr::except($data, 'questions')));

                foreach (data_get($data, 'questions') as $index => $question) {
                    $question['quiz_id'] = $quiz->target->id;
                    $question['index'] = $question['index'] ?? ++$index;

                    Question::create($question);
                }
            }
        }
    }
}
