Feature: I would like to edit Wroclaw

  Scenario Outline: Insert records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/wrocpopr/"
    Then I should not see "<wroclaw>"
    And I follow "Create a new entry"
    Then I should see "wrocpopr creation"
    When I fill in "Wroclaw" with "<wroclaw>"
    And I fill in "Population" with "<population>"
    And I press "Create"
    Then I should see "<wroclaw>"
    And I should see "<population>"

  Examples:
    |wroclaw         |population |
    |Iglasta         |12         |
    |Nasienna        |987        |
    |Na Polance      |34         |



  Scenario Outline: Edit records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/wrocpopr/"
    Then I should not see "<new-wroclaw>"
    When I follow "<old-wroclaw>"
    Then I should see "<old-wroclaw>"
    When I follow "Edit"
    And I fill in "Wroclaw" with "<new-wroclaw>"
    And I fill in "Population" with "<new-population>"
    And I press "Update"
    And I follow "Back to the list"
    Then I should see "<new-wroclaw>"
    And I should see "<new-population>"
    And I should not see "<old-wroclaw>"

  Examples:
    |old-wroclaw     |new-wroclaw      |new-population|
    |Iglasta         |Mydlana          |50            |
    |Nasienna        |Nauczycielska    |46            |


  Scenario Outline: Delete records
    Given I am on homepage
    And I follow "Login"
    And I fill in "Username" with "admin"
    And I fill in "Password" with "loremipsum"
    And I press "Login"
    And I go to "/admin/wrocpopr/"
    Then I should see "<wroclaw>"
    When I follow "<wroclaw>"
    Then I should see "<wroclaw>"
    When I press "Delete"
    Then I should not see "<wroclaw>"

  Examples:
    |wroclaw         |
    |Na Polance      |
    |Mydlana         |
    |Nauczycielska   |