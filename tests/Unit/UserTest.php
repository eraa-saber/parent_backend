<?php
class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testUser()
    {


        //test case to return all transactaions from all providers
        $response = $this->call('GET', 'api/v1/users');
        $this->assertEquals(200, $response->status());
        $this->json('GET', 'api/v1/users', ['Accept' => 'application/json'])
            ->seeJsonEquals([
                "success"=> true,
                "message"=>"",
                "data"=>
                    [
                            [
                                "parentAmount"=>"200",
                                "Currency"=>"USD",
                                "parentEmail"=>"parent1@parent.eu",
                                "statusCode"=>1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=>"100",
                                "Currency"=>"USD",
                                "parentEmail"=>"parent12@parent.eu",
                                "statusCode"=>3,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=>"300",
                                "Currency"=>"USD",
                                "parentEmail"=>"parent13@parent.eu",
                                "statusCode"=>2,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=>"400",
                                "Currency"=>"USD",
                                "parentEmail"=>"parent11@parent.eu",
                                "statusCode"=>1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=>"500",
                                "Currency"=>"USD",
                                "parentEmail"=>"parent15@parent.eu",
                                "statusCode"=>2,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "parentAmount"=>"600",
                                "Currency"=>"USD",
                                "parentEmail"=>"parent16@parent.eu",
                                "statusCode"=>1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ],
                            [
                                "balance"=>300,
                                "currency"=>"AED",
                                "email"=> "parent2@parent.eu",
                                "status"=>100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            [
                                "balance"=>320,
                                "currency"=>"AED",
                                "email"=> "parent2@parent.eu",
                                "status"=>100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            [
                                "balance"=>700,
                                "currency"=>"AED",
                                "email"=> "parent2@parent.eu",
                                "status"=>200,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            [
                                "balance"=>800,
                                "currency"=>"AED",
                                "email"=> "parent2@parent.eu",
                                "status"=>300,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ],
                            [
                                "balance"=>100,
                                "currency"=>"EG",
                                "email"=> "parent2@parent.eu",
                                "status"=>100,
                                "created_at"=> "22/12/2018",
                                "id"=> "4fc2-a8d1"
                            ]
                        ]

            ]);

        //test case to return all users from DataProviderX providers
        $response = $this->call('GET', 'api/v1/users?provider=DataProviderX');
        $this->assertEquals(200, $response->status());
        $this->json('GET', 'api/v1/users?provider=DataProviderX', ['Accept' => 'application/json'])
            ->seeJsonEquals([
                "success"=> true,
                "message"=>"",
                "data"=> [
                    [
                        "parentAmount"=>"200",
                        "Currency"=>"USD",
                        "parentEmail"=>"parent1@parent.eu",
                        "statusCode"=>1,
                        "registerationDate"=> "2018-11-30",
                        "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                    ],
                    [
                        "parentAmount"=>"100",
                        "Currency"=>"USD",
                        "parentEmail"=>"parent12@parent.eu",
                        "statusCode"=>3,
                        "registerationDate"=> "2018-11-30",
                        "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                    ],
                    [
                        "parentAmount"=>"300",
                        "Currency"=>"USD",
                        "parentEmail"=>"parent13@parent.eu",
                        "statusCode"=>2,
                        "registerationDate"=> "2018-11-30",
                        "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                    ],
                    [
                        "parentAmount"=>"400",
                        "Currency"=>"USD",
                        "parentEmail"=>"parent11@parent.eu",
                        "statusCode"=>1,
                        "registerationDate"=> "2018-11-30",
                        "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                    ],
                    [
                        "parentAmount"=>"500",
                        "Currency"=>"EG",
                        "parentEmail"=>"parent15@parent.eu",
                        "statusCode"=>2,
                        "registerationDate"=> "2018-11-30",
                        "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                    ],
                    [
                        "parentAmount"=>"600",
                        "Currency"=>"EUR",
                        "parentEmail"=>"parent16@parent.eu",
                        "statusCode"=>1,
                        "registerationDate"=> "2018-11-30",
                        "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                    ],

                    ]

            ]);

        //test case to return all users from DataProviderX provider and currency EUR
        $response = $this->call('GET', 'api/v1/users?provider=DataProviderX&currency=EUR');
        $this->assertEquals(200, $response->status());
        $this->json('GET', 'api/v1/users?provider=DataProviderX&currency=EUR')
            ->seeJsonEquals([
                "success"=> true,
                "message"=>"",
                "data"=> [
                            [
                                "parentAmount"=>"600",
                                "Currency"=>"EUR",
                                "parentEmail"=>"parent16@parent.eu",
                                "statusCode"=>1,
                                "registerationDate"=> "2018-11-30",
                                "parentIdentification"=> "d3d29d70-1d25-11e3-8591-034165a3a613"
                            ]
                ]

            ]);


        //test case to return users from DataProviderY , balance between 200 and 300 , and currcy is EG
        $response = $this->call('GET', 'api/v1/users?provider=DataProviderY&amounteMin=200&amounteMax=300&currency=EG');
        $this->assertEquals(200, $response->status());
        $this->json('GET', 'api/v1/users?provider=DataProviderY&amounteMin=200&amounteMax=300&currency=EG', ['Accept' => 'application/json'])
            ->seeJsonEquals([
                "success"=> true,
                "message"=>"",
                "data"=>
                    [
                        "balance"=>100,
                        "currency"=>"EG",
                        "phone"=> "00201134567890",
                        "status"=>100,
                        "created_at"=> "22/12/2018",
                        "id"=> "4fc2-a8d1"
                    ]
            ]);


        //test case for provider doesn't exists
        $response = $this->call('GET', 'api/v1/users?provider=DataProviderP');
        $this->assertEquals(404, $response->status());
        $this->json('GET', 'api/v1/users?provider=DataProviderZZ', ['Accept' => 'application/json'])
            ->seeJsonEquals([
                "success"=> false,
                "message"=>"Provider Not Found",
            ]);
    }
}
