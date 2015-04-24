Feature: I would like to edit krakow

  Scenario Outline: Insert records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/krakow/"
    Then I should not see "<krakow>"
     And I follow "Create a new entry"
    Then I should see "Krakow creation"
    When I fill in "Name" with "<krakow>"
     And I fill in "Caption" with "<caption>"
     And I fill in "Size" with "<size>"
     And I press "Create"
    Then I should see "<krakow>"
     And I should see "<caption>"
     And I should see "<size>"

  Examples:
    | krakow      | caption             | size |
    | pawia       | to jest ul. pawia   | 123  |
    | zacisze     | to jest ul. zacisze | 456  |
    | matejki     | to jest ul. matejki | 987  |



  Scenario Outline: Edit records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/krakow/"
    Then I should not see "<new-krakow>"
    When I follow "<old-krakow>"
    Then I should see "<old-krakow>"
    When I follow "Edit"
     And I fill in "Name" with "<new-krakow>"
     And I fill in "Caption" with "<new-caption>"
     And I fill in "Size" with "<new-size>"
     And I press "Update"
     And I follow "Back to the list"
    Then I should see "<new-krakow>"
     And I should see "<new-caption>"
     And I should see "<new-size>"
     And I should not see "<old-krakow>"

  Examples:
    | old-krakow      | new-krakow     | new-caption               | new-size |
    | pawia           | paderewskiego  | to jest ul. paderewskiego | 469      |
    | zacisze         | krzywa         | to jest ul. krzywa        | 285      |


  Scenario Outline: Delete records
   Given I am on homepage
     And I follow "Login"
     And I fill in "Username" with "admin"
     And I fill in "Password" with "loremipsum"
     And I press "Login"
     And I go to "/admin/krakow/"
    Then I should see "<krakow>"
    When I follow "<krakow>"
    Then I should see "<krakow>"
    When I press "Delete"
    Then I should not see "<krakow>"

  Examples:
    |  krakow       |
    | paderewskiego |
    | krzywa        |
    | matejki       |