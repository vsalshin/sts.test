<?php
    
    namespace Sts\Test;
    
    use Sts\Test\Entity\ProjectTable;
    use Sts\Test\Entity\SeasonTable;
    use Sts\Test\Entity\SeriesTable;

    /**
     * Класс для заполнения БД тестовыми данными
     * Class TestData
     * @package Sts\Test
     */
    class TestData
    {
        private static function getData()
        {
            return [
                [
                    'title' => 'Пекарь и красавица',
                    'description' => 'Встретив суперзвезду в туалете ресторана, пекарь из Малаховки даже и не подозревал, как изменится его жизнь. Роскошные вечеринки в стиле «Великого Гэтсби», светские…',
                    'seasons' => [
                        [
                            'title' => '1 сезон',
                            'description' => '1 сезон сериала Пекарь и красавица',
                            'series' => [
                                [
                                    'title' => '1 серия',
                                    'description' => 'Проводя вечер в дорогом московском ресторане, Андрей ссорится со своей девушкой Оксаной. Зато знакомится с известной моделью и актрисой, дочкой миллионера Сашей Лариной…',
                                ],
                                [
                                    'title' => '2 серия',
                                    'description' => 'Андрей получает приглашение от Саши на вечеринку в ее доме. Гуччи его подставляет, а Саша зовет прокатиться с ней завтра в Лондон. Оксана по-прежнему ждет от Андрея предложения…',
                                ],
                                [
                                    'title' => '3 серия',
                                    'description' => 'Саша и Андрей в сопровождении Гуччи летят в Лондон на открытие галереи. Саша уезжает на ужин с известным продюсером и его сыном, Андрей остается один в неизвестном районе города. Тем временем в Малаховке Ваня следит за сестрой, и узнает, с кем она встречается...',
                                ],
                                [
                                    'title' => '4 серия',
                                    'description' => 'Андрей выручает Сашу из неприятной ситуации в отеле и остается ночевать у нее в номере. Катя умоляет Ивана не рассказывать родителям о ее парне…',
                                ],
                                [
                                    'title' => '5 серия',
                                    'description' => 'По возвращении из Лондона Андрей пытается выяснить статус их отношений. Он приглашает Сашу на свидание, во время которого Саша тут же напрашивается к нему в гости. Оксана пытается выяснить у подруг, с кем Андрей ей изменяет… ',
                                ],
                            ]
                        ]
                    ]
                ],
                [
                    'title' => 'Молодежка',
                    'description' => '«Молодежка» объединила фанатов спорта и любителей сериалов. Они вместе переживали за судьбу команды «Медведи». Молодые хоккеисты учились дружить и…',
                    'seasons' => [
                        [
                            'title' => '1 сезон',
                            'description' => '1 сезон сериала Молодежка',
                            'series' => [
                                [
                                    'title' => '1 серия',
                                    'description' => 'Для хоккейной команды «Медведи» из небольшого провинциального города наступила черная полоса: очередная игра закончилась поражением; тренер, напрочь разочаровавшийся в своих подопечных, бросает команду прямо посреди сезона. Кажется, что сами парни больше не верят в собственные силы. Но на одной из тренировок их ждет большой сюрприз – новый тренер Сергей Макеев. Он молод и амбициозен, к тому же имеет игровой опыт в НХЛ. Однако и задача перед ним стоит непростая – вывести команду лузеров на первое место.',
                                ],
                                [
                                    'title' => '2 серия',
                                    'description' => 'Кисляк сообщает команде о своих подозрениях насчёт нового тренера. Между Казанцевым Романенко и Макеевым происходит новый конфликт. Марина всячески пытается помешать Кострову поговорить с Егором. Макеев обещает ребятам сюрприз на следующей тренировке, однако радостное ожидание сменяется шоком – далеко не всем сюрприз приходится по вкусу. Костров пытается устроиться на ночлег на вокзале, но вместо этого попадает в полицию. Единственным, кто приходит ему на помощь, оказывается Макеев.',
                                ],
                                [
                                    'title' => '3 серия',
                                    'description' => 'Казанцев не доволен изменениями, которые Макеев проводит в команде: он предупреждает тренера о проблемах с родителями. Кисляк под давлением родителей мирится с Яной. Отец одного из хоккеистов угрожает Макееву неприятностями. Пономарев продолжает ходить на тренировки несмотря на распоряжение Макеева. Яна застает Кисляка врасплох, Костров отказывается подыграть товарищу. Кисляк и Яна снова ссорятся. На первую игру под руководством Макеева приезжает главный спонсор команды – Олег Иванович Калинин.',
                                ],
                                [
                                    'title' => '4 серия',
                                    'description' => 'Чуда не произошло – «Медведи» снова проигрывают. Конфликт Кострова и Кисляка продолжается на льду. Калинин собирает тренерский состав на совещание. Казанцев и Романенко предвкушают «разнос» Макеева… Эдик просит Пономарева не приходить на их с Алиной тренировки. Макеев просит дополнительное время для тренировок: Казанцев выдвигает условия, которые Макеев выполнить не в состоянии. Яна больше не верит Кисляку, и Кисляк предлагает Марине перевести их отношения на новый уровень. Желая усилить состав команды, Макеев хочет вернуть некогда очень перспективного игрока, но оказывается, что второй тренер категорически против возвращения парня в команду. ',
                                ],
                                [
                                    'title' => '5 серия',
                                    'description' => 'Макеев хочет вернуть Антипова в команду, но ни сам Антон, ни его мать не хотят даже слышать об этом. Кисляк снова попадает впросак, но на этот раз отец переходит от слов к делу. Пономарев остается без работы. Егор начинает подозревать, что Марина его обманывает. Конфликт между Костровым и Кисляком разгорается с новой силой. Макееву, наконец, удается узнать о причине ухода Антипова из команды. Неожиданно для Антона Макеев принимает его сторону.',
                                ],
                            ]
                        ],
                        [
                            'title' => '2 сезон',
                            'description' => '2 сезон сериала Молодежка',
                            'series' => [
                                [
                                    'title' => '1 серия',
                                    'description' => 'Команда «Медведи» должна сыграть внеплановую серию игр, чтобы иметь право играть в МХЛ. В это же время у многих игроков начинается ЕГЭ, а у тренера – свадьба.',
                                ],
                                [
                                    'title' => '2 серия',
                                    'description' => 'Егор узнает о тайне Димы. Алина получает неожиданное приглашение. Калинин навещает «Медведей», но там его ждет неприятный сюрприз.',
                                ],
                                [
                                    'title' => '3 серия',
                                    'description' => 'Дима Щукин уходит из команды из-за проблем со здоровьем. Родители Сени выясняют отношения.',
                                ],
                                [
                                    'title' => '4 серия',
                                    'description' => 'Команда «Медведи» добивается своей цели - выигрывает ответственный матч и попадает в молодежную группу. Но тут у спонсора команды начинаются проблемы с законом. Будущее команды под вопросом.',
                                ],
                                [
                                    'title' => '5 серия',
                                    'description' => 'У «Медведей» появляется новый спортивный директор. Кисляка отчисляют из университета.',
                                ],
                            ]
                        ],
                    ]
                ],
                [
                    'title' => 'Воронины',
                    'description' => 'В обычном доме в трехкомнатной квартире живет молодая семья: Костя, его жена Вера и их дети — пятилетняя дочка и два маленьких сына-близнеца. Костя — известный…',
                    'seasons' => [
                        [
                            'title' => '1 сезон',
                            'description' => '1 сезон сериала Воронины',
                            'series' => [
                                [
                                    'title' => '1 серия',
                                    'description' => 'В семье Ворониных-старших к ссоре может привести все, что угодно. Итог – мама Кости пришла жить к сыну, а его жена Вера ушла в квартиру родителей...',
                                ],
                                [
                                    'title' => '2 серия',
                                    'description' => 'Вера устала от домашних дел и просит Костю выделить ей хоть немного личного времени. Костя с детьми уходит к своим родителям, а когда внезапно возвращается, видит, что Вера плачет...',
                                ],
                                [
                                    'title' => '3 серия',
                                    'description' => 'Николаю Петровичу исполняется 65 лет, и все родные дарят ему подарки. Подарок сына Лени очень нравится старшему Воронину, и Костя решает переплюнуть брата...',
                                ],
                                [
                                    'title' => '4 серия',
                                    'description' => 'В руки Лени попал очень интересный интеллектуальный тест. Вся семья Ворониных должна его пройти. Кто же окажется самым умным в этом сумасшедшем доме?',
                                ],
                                [
                                    'title' => '5 серия',
                                    'description' => 'Обедая со своим другом в кафе, Костя знакомится с очень симпатичной официанткой. Частые визиты мужа в ресторан настораживают Веру…',
                                ],
                            ]
                        ],
                        [
                            'title' => '2 сезон',
                            'description' => '2 сезон сериала Воронины',
                            'series' => [
                                [
                                    'title' => '1 серия',
                                    'description' => 'В квартире Ворониных-младших просто невозможно жить, но на этот раз Воронины-старшие тут ни при чем – в квартире Веры и Кости травят тараканов. Что ж, придется им на время переехать в «обитель зла», в квартиру родителей. Сейчас-то и решится – кто кого?',
                                ],
                                [
                                    'title' => '2 серия',
                                    'description' => 'Когда муж не приходит с работы домой к ужину, это не очень хорошо. А уж если он задержался в офисе не по работе, а чтобы попить с друзьями пиво – тут уж, пиши «пропало»! Теперь единственный вариант загладить свою вину – работать дома!',
                                ],
                                [
                                    'title' => '3 серия',
                                    'description' => 'Для любой матери трагедия, когда дети любят кого-то больше чем тебя. А для любой бабушки трагедия, когда с ее родными внуками сидит какая-то там няня. Костя же, как всегда, оказывается меж двух огней!',
                                ],
                                [
                                    'title' => '4 серия',
                                    'description' => 'Как известно - отношения между родителями Кости и Веры напоминают «вооруженный нейтралитет». А тут Верины родители пригласили всю семью Ворониных в дорогой ресторан. На чьей стороне будет Костя? Ему предстоит сделать единственно правильный выбор',
                                ],
                                [
                                    'title' => '5 серия',
                                    'description' => 'На носу сорокалетний юбилей свадьбы родителей Кости и Лени. Вера заставляет братьев устроить праздник для своих любимых мамы и папы и случайно узнает, что Воронины-старшие были в шаге от развода. Оказывается, у Галины Ивановны Ворониной еще много тайн…',
                                ],
                            ]
                        ],
                        [
                            'title' => '3 сезон',
                            'description' => '3 сезон сериала Воронины',
                            'series' => [
                                [
                                    'title' => '1 серия',
                                    'description' => 'Зачастую родители многого не знают о своих детях. А всегда так хочется узнать сына поближе. Так как же это сделать? Конечно, можно встретиться с его учителями, можно расспросить о нём его друзей или можно просто с ним поговорить. Но Галина поняла: ничто не расскажет ей о родном сыне лучше… чем его дневник.',
                                ],
                                [
                                    'title' => '2 серия',
                                    'description' => 'Костя, не прикладывая особых усилий, скоро выпустит свою книгу, а Лёня всю жизнь отдал службе в милиции, и скоро ему присвоят звание майора! Смогут ли родные братья искренне порадоваться успехам друг друга?',
                                ],
                                [
                                    'title' => '3 серия',
                                    'description' => 'Без чего не сможет прожить не один современный человек? Без огня? Воды? Еды? А у вас в квартире когда-нибудь отключали спутниковую тарелку? Нет? Вот когда её отключат, вы узнаете, без чего человек в наше время не проживет и минуты…',
                                ],
                                [
                                    'title' => '4 серия',
                                    'description' => 'Вера Воронина ужасно устала, ведь у неё целых 7 детей: трое своих, Костя и ещё семейка Ворониных-старших. А еще готовка, стирка, уборка. Ей безумно хочется от всего этого отдохнуть, и поэтому… она устраивается на работу!',
                                ],
                                [
                                    'title' => '5 серия',
                                    'description' => 'Работа спортивного журналиста заключает в себе множество плюсов: бесплатное посещение самых важных матчей, удобная ложа для прессы, масса слухов и сплетен спортивного мира. Но некоторые плюсы можно увидеть только со стороны. И увидит их не кто иной, как Николай…',
                                ],
                            ]
                        ]
                    ],
                ],
            ];
        }
    
        /**
         * @throws \Bitrix\Main\ArgumentException
         * @throws \Bitrix\Main\SystemException
         */
        public static function fillDB()
        {
            $data = self::getData();
            foreach ($data as $project)
            {
                $projectEO = ProjectTable::createObject(false);
                $projectEO->setName($project['title'])
                    ->setDescription($project['description'])
                    ->save();
                foreach ($project['seasons'] as $season)
                {
                    $seasonEO = SeasonTable::createObject(false);
                    $seasonEO->setName($season['title'])
                        ->setDescription($season['description'])
                        ->setProjectId($projectEO->getId())
                        ->save();
                    
                    foreach ($season['series'] as $series)
                    {
                        $seriesEO = SeriesTable::createObject(false);
                        $seriesEO->setName($series['title'])
                            ->setDescription($series['description'])
                            ->setSeasonId($seasonEO->getId())
                            ->save();
                    }
                }
            }
        }
    }