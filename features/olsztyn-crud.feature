Feature: I would like to edit olsztyn

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/olsztyn/"
    Then I should not see "<olsztyn>"
     And I follow "Create a new entry"
    Then I should see "Olsztyn creation"
    When I fill in "Name" with "<olsztyn>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<olsztyn>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | olsztyn       | caption          |  size   | 
    | Lubelska      | opis Liubelska   |  150    |
    | Warszawska    | opis Warszawska  |  250    |
    | Poznanska     | opis Poznanska   |  175    |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/olsztyn/"
    Then I should not see "<new-olsztyn>"
    When I follow "<old-olsztyn>"
    Then I should see "<old-olsztyn>"
    When I follow "Edit"
     And I fill in "Name" with "<new-olsztyn>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-olsztyn>"
     And I should see "<new-caption>"  
     And I should see "<new-size>"
     And I should not see "<old-olsztyn>"

  Examples:
    | old-olsztyn          | new-olsztyn   | new-caption      | new-size |
    | Warszawska           | Opolska       | opis Opolska     |  350     |      

  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/olsztyn/"
    Then I should see "<olsztyn>"
    When I follow "<olsztyn>"
    Then I should see "<olsztyn>"
    When I press "Delete"
    Then I should not see "<olsztyn>"

  Examples:
    |  olsztyn      |
    | Lubelska    |
    | Opolska     |
    | Poznanska   |