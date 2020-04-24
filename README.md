# DYNATECH2

### Instructions:
    Just run the "solutions.php" file, it is ready for tests.
    
### About the solutions:

##### maxProfit function:
  1. I created an empty "prices" array, which I will be populating later.
  2. Made a foreach where I go through "priesAndPurchases" array and add one more value "spent" and
      add each of the prices to "prices" array.
  3. Then I find index of the biggest price, and store it in "maxPriceDayIndex".
  4. After that, I create a new array for sorting, and sort it ascendingly.
  5. Then I get top days, and fom those I get second best price and third best price, which are stored
      in variables aswell.
  6. I find out how many selling days is most profitable to have, and they are either one or two.
  7. Then I calculate how much income came from first selling day and after that, if I have
      the second selling day, I calculate how much income came from that aswell.
  8. In the end, I return total maximum profit that could've been made in given days.
      
##### stringCost function:
  1. First of all, I created two arrays by splitting strings "a" and "b", then counted their length
      and found out which one of them is longest.
  2. After that I found out which method is cheaper to use - either replacing or inserting and then deleting.
  3. Then I check if strings are the same, if they are, cost for transforming of course is 0.
  4. If one of the strings are empty, then to transform I simply need to calculate how many inserts I will
      have to make and their cost.
  5. If the longest string is only one character long, and if we got to this point in if/else then we can safely
      assume that the other one is not empty too, then I simply need to calculate how much it will cost me to
      transform that one character, by checking if we are using replace or delete and insert methods.
  6. If all above statements are not true, then I go through the longest string, and start comparing both of the
      strings and counting costs for replacing/deleting/inserting characters.
  7. In the end I return variable "cost" as integer.
  
  ##### incrementalMedian function:
  1. In the beginning, I sorted the "values" array from lowest to highest.
  2. Then I added first value of "values" to result already, because that will always be the first value in result
  3. After that I started going through "values" array and getting the medians from 0 to incrementing end point
      as loop goes on.
  4. I populate the "result" array with resuts and in the end I return it as array.
  
### Room for improvement:
    This time the hardest task for me was to do maxProfit function, and I am pretty sure, if I would be given more
    time I could make the code shorter and more effective. One thing that threw me off right at the start was that
    oil is being bought on bad days too, which is not logical, if we assume that we know all the future prices, like
    asked to assume in the exercise. Also in stringCost, I think that I could make that if/else statement a little
    bit shorter by giving it a little bit more time.
