<?php
include "../includes/connect.php";

// Check if product_id is provided
if (isset($_POST['product_id'])) {
    $product_id = htmlspecialchars($_POST['product_id']);
    $attribute_types = $_POST['attribute_type'];
    $attribute_values = $_POST['attribute_values'];
    $price_values = $_POST['price_values'];
    $stock = htmlspecialchars($_POST['stock']);

    // Array to store attribute_ids to avoid multiple queries
    $attribute_ids = [];

    foreach ($attribute_types as $index => $at_type) {
        if (!isset($attribute_ids[$at_type])) {
            $stm = $con->prepare('SELECT attribute_id FROM `product_attributes` WHERE name = ?');
            $stm->bind_param('s', $at_type);
            $stm->execute();
            $result = $stm->get_result();

            if ($row = $result->fetch_assoc()) {
                $attribute_ids[$at_type] = $row['attribute_id'];
            } else {
                $stm_insert_attribute = $con->prepare('INSERT INTO `product_attributes` (name) VALUES (?)');
                $stm_insert_attribute->bind_param('s', $at_type);
                if ($stm_insert_attribute->execute()) {
                    $attribute_ids[$at_type] = $con->insert_id;
                } else {
                    echo "Error inserting attribute type: $at_type";
                    return;
                }
                $stm_insert_attribute->close();
            }
            $stm->close();
        }

        $attribute_id = $attribute_ids[$at_type];

        foreach ($attribute_values[$index] as $value_index => $value) {
            $stm_value = $con->prepare('SELECT attribute_value_id FROM `product_attribute_values` WHERE attribute_id = ? AND value = ?');
            $stm_value->bind_param('is', $attribute_id, $value);
            $stm_value->execute();
            $result_value = $stm_value->get_result();

            if ($row_value = $result_value->fetch_assoc()) {
                $value_id = $row_value['attribute_value_id'];
            } else {
                $stm_insert_value = $con->prepare('INSERT INTO `product_attribute_values` (attribute_id, value) VALUES (?, ?)');
                $stm_insert_value->bind_param("is", $attribute_id, $value);
                if ($stm_insert_value->execute()) {
                    $value_id = $con->insert_id;
                } else {
                    echo "Error inserting attribute value: $value";
                    return;
                }
                $stm_insert_value->close();
            }
            $stm_value->close();

            $price_value = htmlspecialchars($price_values[$index][$value_index]);
            $stm_variation = $con->prepare('INSERT INTO `product_variations`(product_id, attribute_value_id, stock, price_adjustment) VALUES (?, ?, ?, ?)');
            $stm_variation->bind_param("iiid", $product_id, $value_id, $stock, $price_value);

            if (!$stm_variation->execute()) {
                echo "Failed to insert into variations for attribute: $at_type, value: $value";
            }
            $stm_variation->close();
        }
    }

    echo "success";
} else {
    echo "Missing product_id.";
}

$con->close();
?>
