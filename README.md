# Offer List 

This is a very simple app that displays a list of cash back offers. 

The goal of the app is to create a backend that follows modern best practices, including:
1. Understanding of MVC architecture
2. Dependency Injection
3. Repository pattern
4. Unit Testing
5. Minimal environment set up via use of docker

## Set up instructions
1. Install **docker** and **git**
3. Open OS terminal and navigate to a directory where you want to clone this repo to
4. Run `git clone https://github.com/Cohaven/offer-list.git .`
5. Run `docker-compose up`
6. In a browser, go to `localhost`

## Overview of the solution
* Docker is used to set up the development environment that can be easily deployed and shared with others. `Dockerfile` sets up server-side dependencies, while `docker-compose.yml` simplifies the deployment procedure by reducing it to just one simple command. This file can also be used in the future to add a database container to the development stack.
* I used the Slim microframework so that there are no doubts about what code was mine and what came with the framework. I did not use any skeleton/boilerplate code.
* I moved the routes and container code out of the `index.php` file to make them easier to independently modify without worrying aboout or potentially affecting important wiring mechanisms in the file. 
There is also a security benefit: if PHP stops working for whatever reason, and `index.php` is shown as plain text in the browser, it won't disclose any routes or dependencies, so it won't reveal most of the info about the app.
* I use Twig for the view template. It's a great templating engine from Symfony. I didn't add any styling to the view since the focus of the project is the backend.
* I use interfaces for classes that are likely to be swapped out in the future. They make sure that any future class replacements meet the expectations of the existing code base (often referred to as a "contract").
* I chose to use a Mapper class in the Model layer to abstract the data source and its schema. This way, the Domain class or the Repository does not need to match the schema or naming conventions of the data source.
* I use class constants to define strings that are, or will be, reused, and give them names that are helpful in identifying their purpose.

## Things I could have added or done differently
* An OfferCollection class to contain a list of Offer instances, instead of using a regular array. That would give more control over how a collection of offers is handled, making the handling more predictable.
* I could have added Javadoc style comments, but since there isn't much custom or complex business logic going on here, I didn't feel it was necessary.
* Since file traversal isn’t query based, I made a FileAdapterInterface, instead of a generic AdapterInterface. The adapters for file and db can be made to work very similar, but that would require extra brainstorming and parsing. So if a switch to DB is required in the future, some code changes should be made. 
* I unit tested only 1 class to give an idea of how it would be set up. In a real application, I would test most of the public functions of classes while mocking any dependencies. I would avoid testing getters and setters, as well as similar very simple functions that don't do much processing.

Let me know if you have any feedback!
