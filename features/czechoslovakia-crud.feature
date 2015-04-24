Feature: I would like to edit Czechoslovakia

  Scenario Outline: Insert records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/czechoslovakia/"
    Then I should not see "<czechoslovakia>"
    And I follow "Create a new entry"
    Then I should see "Czechoslovakia creation"
    When I fill in "Name" with "<czechoslovakia>"
    And I fill in "Caption" with "<caption>"
    And I fill in "Size" with "<size>"
    And I press "Create"
    Then I should see "<czechoslovakia>"
    And I should see "<caption>"
    And I should see "<size>"

  Examples:
    | czechoslovakia | caption             | size |
    | Prague         | threshold           | 48   |
    | Košice         | Capital city        | 690  |
    | Trnava         | second largest city | 1500 |



  Scenario Outline: Edit records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/czechoslovakia/"
    Then I should not see "<new-czechoslovakia>"
    When I follow "<old-czechoslovakia>"
    Then I should see "<old-czechoslovakia>"
    When I follow "Edit"
    And I fill in "Name" with "<new-czechoslovakia>"
    And I fill in "Caption" with "<new-caption>"
    And I fill in "Size" with "<new-size>"
    And I press "Update"
    And I follow "Back to the list"
    Then I should see "<new-czechoslovakia>"
    And I should see "<new-caption>"
    And I should see "<new-size>"
    And I should not see "<old-czechoslovakia>"

  Examples:
    | old-czechoslovakia | new-czechoslovakia  | new-caption                    | new-size |
    | Prague             | Liberec             | located in the center of hills | 480      |
    | Trnava             | Olomouc             | mining town                    | 47       |


  Scenario Outline: Delete records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/czechoslovakia/"
    Then I should see "<czechoslovakia>"
    When I follow "<czechoslovakia>"
    Then I should see "<czechoslovakia>"
    When I press "Delete"
    Then I should not see "<czechoslovakia>"

  Examples:
    | czechoslovakia |
    | Liberec        |
    | Košice         |
    | Olomouc        |
