# challenge-pokemon-php

This exercise is for the becode course. it's a work in progress.
Made by MonoraxXiV.

##the learning goals are:

- Starting with PHP
    - To be able to write a simple condition and a simple loop
    - To know how to access external resources (API)
- know where to search for PHP documentation
- To find out how much easier it is to learn a second programming language

###The original pokedex's objectives
Basic functionality that is expected (read: core features):

- You can search a pokémon by name and by ID
    Of said pokémon you need to show:
    - The ID-number
    - An image (sprite)
    - At least 4 "moves"
    - The previous evolution, only if it exists, along with their name and image. Be carefull, you cannot just do ID-1 to get the previous form, for example look into "magmar" - "magmortar". You have to use a seperate api call for this!

Make your web page look like a pokédex by adding a little CSS.

#### New things learned/problems encountered
- Learned about isset ().
- learned how to go through arrays in PHP.
- learned to use count(array) instead of the js equivalent array.length
- Used a wrong path for the previous evolution, got a lot of errors because of it.
- Had a part of code double, but only really activated on smeargle/ditto, removed it and fixed a lot of bugs
- Def learned to read the error logs to double check the lines mentioned.