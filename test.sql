INSERT INTO `products` (`name`, `description`, `price`, `created_at`, `updated_at`) VALUES
('1', 'Product 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore ipsam nostrum, reiciendis inventore recusandae possimus est eveniet!', '50', CURRENT_TIME(), CURRENT_TIME()),
('2', 'Product 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore ipsam nostrum, reiciendis inventore recusandae possimus est eveniet!', '60', CURRENT_TIME(), CURRENT_TIME()),
('3', 'Product 3', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore ipsam nostrum, reiciendis inventore recusandae possimus est eveniet!', '75', CURRENT_TIME(), CURRENT_TIME()),
('4', 'Product 4', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore ipsam nostrum, reiciendis inventore recusandae possimus est eveniet!', '45.99', CURRENT_TIME(), CURRENT_TIME()),
('5', 'Product 5', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, dolore ipsam nostrum, reiciendis inventore recusandae possimus est eveniet!', '30.50', CURRENT_TIME(), CURRENT_TIME());

INSERT INTO `orders` (`id`, `created_at`, `updated_at`) VALUES
('1', CURRENT_TIME(), CURRENT_TIME());

INSERT INTO `order_product` (`order_id`, `product_id`, `created_at`, `updated_at`) VALUES
('1', '1', CURRENT_TIME(), CURRENT_TIME()),
('1', '2', CURRENT_TIME(), CURRENT_TIME()),
('1', '3', CURRENT_TIME(), CURRENT_TIME()),
('1', '4', CURRENT_TIME(), CURRENT_TIME()),
('1', '5', CURRENT_TIME(), CURRENT_TIME());
