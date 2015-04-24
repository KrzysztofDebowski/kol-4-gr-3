Feature: I would like to edit New York

  Scenario Outline: Insert records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/newyork/"
    Then I should not see "<newyork>"
    And I follow "Create a new entry"
    Then I should see "New York creation"
    When I fill in "Name" with "<newyork>"
    And I fill in "Caption" with "<caption>"
    And I fill in "Size" with "<size>"
    And I press "Create"
    Then I should see "<newyork>"
    And I should see "<caption>"
    And I should see "<size>"

  Examples:
    | newyork     | caption              | size       |
    | Bleecker    | Opis Bleecker        | 1000       |
    | Orchard     | Opis  Orchard        | 2000       |
    | Bedford     | Opis Bedford         | 3000       |



  Scenario Outline: Edit records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/newyork/"
    Then I should not see "<new-newyork>"
    When I follow "<old-newyork>"
    Then I should see "<old-newyork>"
    When I follow "Edit"
    And I fill in "Name" with "<new-newyork>"
    And I fill in "Caption" with "<new-caption>"
    And I fill in "Size" with "<new-size>"
    And I press "Update"
    And I follow "Back to the list"
    Then I should see "<new-newyork>"
    And I should see "<new-newyork>"
    And I should not see "<old-newyork>"

  Examples:
    | old-newyork       | new-newyork    | new-caption      | new-size         |
    | Bleecker          | N-E-W-B-L-E    | Opis             | 1200             |
    | Orchard           | N-E-W-O-R-C    | Opis ulicy       | 1100             |


  Scenario Outline: Delete records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/newyork/"
    Then I should see "<newyork>"
    When I follow "<newyork>"
    Then I should see "<newyork>"
    When I press "Delete"
    Then I should not see "<newyork>"

  Examples:
    |  newyork        |
    | Bedford         |
    | N-E-W-B-L-E     |
    | N-E-W-O-R-C     |
