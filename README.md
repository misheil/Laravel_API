# Laravel API Application - PHP

Laravel application using best practices that calculates the reach of a specific tweet. User should be able to enter the URL of a tweet. The application will lookup the people who retweeted the tweet using the Twitter API. The application then sums up the amount of followers each user has that has retweeted the tweet. These results need to be stored in the database for two hours. If someone tries to calculate the reach of a tweet that has already been calculated the results should be returned from the database. After two hours the database should be updated.

![alt text](https://github.com/misheil/Laravel_API/blob/master/public/img/Twitter.gif)
