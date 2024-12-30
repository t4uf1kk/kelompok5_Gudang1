CREATE DATABASE stock_gudang;
USE stock_gudang;

-- Tabel m_item
CREATE TABLE m_item (
    item_id INT AUTO_INCREMENT PRIMARY KEY,
    item_name VARCHAR(255) NOT NULL,
    item_price DECIMAL(10, 2) NOT NULL,
    item_quantity INT NOT NULL
);

-- Tabel m_mutasi
CREATE TABLE m_mutasi (
    mutasi_id INT AUTO_INCREMENT PRIMARY KEY,
    mutasi_item_id INT,
    mutasi_date DATE NOT NULL,
    mutasi_quantity INT NOT NULL,
    mutasi_price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (mutasi_item_id) REFERENCES m_item(item_id)
);

-- Tabel m_supplier
CREATE TABLE m_supplier (
    supplier_id INT AUTO_INCREMENT PRIMARY KEY,
    supplier_name VARCHAR(255) NOT NULL,
    supplier_contact VARCHAR(255) NOT NULL,
    supplier_address TEXT NOT NULL
);

-- Data contoh untuk m_item
INSERT INTO m_item (item_name, item_price, item_quantity) VALUES
('Barang A', 50000, 100),
('Barang B', 100000, 50),
('Barang C', 75000, 200);

-- Data contoh untuk m_supplier
INSERT INTO m_supplier (supplier_name, supplier_contact, supplier_address) VALUES
('Supplier 1', '081234567890', 'Jl. Contoh Alamat No. 1'),
('Supplier 2', '082345678901', 'Jl. Contoh Alamat No. 2');

-- Data contoh untuk m_mutasi
INSERT INTO m_mutasi (mutasi_item_id, mutasi_date, mutasi_quantity, mutasi_price) VALUES
(1, '2024-12-20', 10, 500000),
(2, '2024-12-22', 5, 500000);
