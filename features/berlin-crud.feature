Feature: I would like to edit berlin

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/berlin/"
    Then I should not see "<berlin>"
     And I follow "Create a new entry"
    Then I should see "Berlin creation"
    When I fill in "Name" with "<berlin>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<berlin"
     And I should see "<caption>"
     And I should see "<size>"


  Examples:
    | berlin            | caption     |  size         |
    | Alexanderplatz    | duza        |   128         |
    | Kaiserdamm        | mala        |   154         |
    | Gendarmenmarkt    | wielka      |   166         |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/berlin/"
    Then I should not see "<new-berlin>"
    When I follow "<old-berlin>"
    Then I should see "<old-berlin>"
    When I follow "Edit"
     And I fill in "Name" with "<new-berlin>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-berlin>"
     And I should see "<new-caption>"
     And I should see "<new-size>"
     And I should not see "<old-berlin>"

  Examples:
    | old-berlin     | new-berlin           | new-caption    | new-size    |
    | Alexanderplatz  | Hermannplatz       | caption_one       |   33     |
    | Kaiserdamm      | Gendarmenmarkt     | caption_two       |   35     |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/berlin/"
    Then I should see "<berlin>"
    When I follow "<berlin>"
    Then I should see "<berlin>"
    When I press "Delete"
    Then I should not see "<berlin>"

  Examples:
    |  berlin    |
    | Hermannplatz   |
    | Gendarmenmarkt |
    