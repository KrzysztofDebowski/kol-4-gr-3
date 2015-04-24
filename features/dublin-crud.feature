Feature: I would like to edit dublin

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
    When I follow "Dublin"
     And I go to "/admin/dublin/"
    Then I should not see "<dublin>"
     And I follow "Create a new entry"
    Then I should see "Dublin creation"
    When I fill in "Name" with "<dublin>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<dublin>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | dublin        | caption        | size |
    | Red Street    | biggest street | 123  |
    | Green Street  | smaller street | 456  |
    | Blue Street   | longer street  | 789  |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     When I follow "Dublin"
     And I go to "/admin/dublin/"
    Then I should not see "<new-dublin>"
    When I follow "<old-dublin>"
    Then I should see "<old-dublin>"
    When I follow "Edit"
     And I fill in "Name" with "<new-dublin>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-dublin>"
     And I should see "<new-caption>"
     And I should see "<new-size>"
     And I should not see "<old-dublin>"

  Examples:
    | old-dublin   | new-dublin            | new-caption   | new-size |
    | Red Street   | R-E-D-S-T-R-E-E-T     | B-G-G-E-S-T   | 321      |
    | Green Street | G-R-E-E-N-S-T-R-E-E-T | S-M-A-L-L-E-R | 654      |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
    When I follow "Dublin"
     And I go to "/admin/dublin/"
    Then I should see "<dublin>"
    When I follow "<dublin>"
    Then I should see "<dublin>"
    When I press "Delete"
    Then I should not see "<dublin>"

  Examples:
    |  dublin               |
    | R-E-D-S-T-R-E-E-T     |
    | G-R-E-E-N-S-T-R-E-E-T |
    | Blue Street           |