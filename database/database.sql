CREATE DATABASE `E-commerce`;
create table `users` 
(
    `id` int auto_increment primary key,
    `name` varchar(255) not null,
    `email` varchar(255) not null unique,
    `password` varchar(255) not null,
    `created_at` timestamp default current_timestamp
);

create table `categories` 
(
    `id` int auto_increment primary key,
    `name` varchar(255) not null,
    `image` varchar(255) not null
    `created_at` timestamp default current_timestamp
);

create table `products` 
(
    `id` int auto_increment primary key,
    `name` varchar(255) not null,
    `price` float not null,
    `discount` float,
    `description` text not null,
    `advantages` text not null,
    `image` varchar(255) not null,
    `category_id` int not null,
    `created_at` timestamp default current_timestamp,
    foreign key (`category_id`) references `categories` (`id`)
);

create table `orders` 
(
    `id` int auto_increment primary key,
    `user_id` int not null,
    `total_price` float not null,
    `created_at` timestamp default current_timestamp,
    foreign key (`user_id`) references `users` (`id`)
);

create table `orders_owners` 
(
    `id` int auto_increment primary key,
    `order_id` int not null,
    `product_id` int not null,
    `first_name` varchar(255) not null,
    `last_name` varchar(255) not null,
    `country` varchar(255) not null,
    `street_address` varchar(255) not null,
    `city` varchar(255) not null,
    `status` enum('Processing' , 'Shipped' , 'Delivered') default 'Processing',
    `phone` varchar(255) not null,
    `notes` varchar(255) not null,
    foreign key (`order_id`) references `orders` (`id`),
    foreign key (`product_id`) references `products` (`id`)
);

create table `orders_products` 
(
    `id` int auto_increment primary key,
    `order_id` int not null,
    `product_id` int not null,
    `offer` float not null,
    `total_price` float not null,
    `quantity` int not null,
    foreign key (`order_id`) references `orders` (`id`),
    foreign key (`product_id`) references `products` (`id`)
);

create table `contact` 
(
    `id` int auto_increment primary key,
    `user_id` int not null,
    `name` varchar(255) not null,
    `email` varchar(255) not null,
    `message` text not null,
    `created_at` timestamp default current_timestamp
);

create table `reviews` 
(
    `id` int auto_increment primary key,
    `product_id` int not null,
    `email` varchar(255) not null,
    `name` varchar(255) not null,
    `message` text not null,
    `created_at` timestamp default current_timestamp,
    foreign key (`product_id`) references `products` (`id`)
);