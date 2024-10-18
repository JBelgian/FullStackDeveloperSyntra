-- SQL queries are written in CAPS - ALWAYS

/* Multipli lines comments
are ... done like this */ 

-- GET ALL
SELECT * FROM products;

-- Make a list with product names and prices,
-- sort on price DESC
-- ASC is the default and is optional

SELECT name, price FROM products ORDER BY price DESC;

-- Make a list from the products with the most recents on top
SELECT * FROM products ORDER BY id DESC;

-- Select all products from the category 'food'
-- If the results is empty no error, just blank tables
SELECT * FROM products WHERE category = 'food';

-- Select all products that cost more than 10 EURO
SELECT * FROM products WHERE price > 10;

-- Select all products from category books and
-- supplier 'prometheus'
SELECT * FROM products 
WHERE category = 'book' AND
supplier = 'prometheus';

-- Select all products where no supplier is provided... hence supplier is empty
-- is NULL is one command ... ORDER by is also tow words
SELECT * FROM products WHERE supplier IS NULL;

-- Select all products where the supplier is not 'unilever'
SELECT * FROM products WHERE NOT supplier = 'unilever';
SELECT * FROM products WHERE supplier != 'unilever';
SELECT * FROM products WHERE supplier <> 'unilever';

-- Basic for all search functions
-- the % is used as 
-- a wildcard to select whatever comes
-- first or after the string (unil)

SELECT * FROM products WHERE
supplier LIKE '%uni%';

-- Aliassen!!
-- Get the average price from my products
-- Choose a random alias but keep it obvious
SELECT AVG(price) AS average FROM products;

-- Count the number of products of the unilever company
SELECT COUNT(*) AS totals FROM products WHERE supplier = 'unilever';

-- Show the most expensive product and the cheapest product
SELECT MAX(price) AS expensive, MIN(price) AS cheapest FROM products;

-- DISTINCT make a list of all companies but show them only once
SELECT DISTINCT supplier FROM products
SELECT DISTINCT supplier FROM products WHERE supplier IS NOT NULL

-- Show me the most expensive 
