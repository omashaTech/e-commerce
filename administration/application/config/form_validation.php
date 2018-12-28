<?php defined('BASEPATH') OR exit('No direct script access allowed');
$config['error_prefix'] = "<div class='error col-md-12 text-right'>";
$config['error_suffix'] = "</div>";
$config =array(
    'Profile' => 
        array(
            array(
                'field' => 'data[name]',
                'label' => 'Name',
                'rules' => 'trim|required|alpha_numeric_spaces'
            ),
            array(
                'field' => 'data[email]',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ),array(
                'field' => 'data[phone]',
                'label' => 'Phone',
                'rules' => 'trim|required|numeric|exact_length[10]'
            ),
            array(
                'field' => 'data[address]',
                'label' => 'Address',
                'rules' => 'trim'
            ),
            array(
                'field' => 'data[zip]',
                'label' => 'Zip Code',
                'rules' => 'trim|numeric|exact_length[6]'
            )
        ), 
    'Password' => 
        array(
            array(
                'field' => 'data[password]',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[8]|max_length[16]'
            ),
            array(
                'field' => 'cnfpassword',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|min_length[8]|max_length[16]|matches[data[password]]'
            ) 
        ),
    'Category' => 
        array(
            array(
                'field' => 'data[name]',
                'label' => 'Category Name',
                'rules' => 'trim|required|alpha_numeric_spaces'
            ),
            array(
                'field' => 'data[title]',
                'label' => 'Title',
                'rules' => 'trim|max_length[70]'
            ),
            array(
                'field' => 'data[keywords]',
                'label' => 'Keywords',
                'rules' => 'trim|max_length[190]'
            ),
            array(
                'field' => 'data[description]',
                'label' => 'Description',
                'rules' => 'trim|max_length[150]'
            )

        ),  
    'Brands' => 
        array(
            array(
                'field' => 'data[name]',
                'label' => 'Brand Name',
                'rules' => 'trim|required|alpha_numeric_spaces'
            )
        ),
    'Products' => 
        array(
            array(
                'field' => 'Product[model]',
                'label' => 'Product Model',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'Product[name]',
                'label' => 'Product Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'Product[mrp]',
                'label' => 'Product MRP',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'Product[minimum]',
                'label' => 'Minimum Order Quantity',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'Product[length]',
                'label' => 'Product Length',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'Product[width]',
                'label' => 'Product Width',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'Product[height]',
                'label' => 'Product Height',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'Product[weight]',
                'label' => 'Product Weight',
                'rules' => 'trim|numeric'
            ),            
            array(
                'field' => 'Product[title]',
                'label' => 'Title',
                'rules' => 'trim|max_length[70]'
            ),
            array(
                'field' => 'Product[keywords]',
                'label' => 'Keywords',
                'rules' => 'trim|max_length[190]'
            ),
            array(
                'field' => 'Categories[]',
                'label' => 'Categories',
                'rules' => 'required'
            ),
            array(
                'field' => 'Specifications[name][]',
                'label' => 'Specification Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'Specifications[value][]',
                'label' => 'Specification Value',
                'rules' => 'trim|required'
            )
        ),        
    'Medicine' => 
        array(
            
            array(
                'field' => 'data[name]',
                'label' => 'Medicine Name',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'data[strength]',
                'label' => 'Medicine Strength',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'data[batch]',
                'label' => 'Medicine Batch',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'data[hsn_sac]',
                'label' => 'Medicine HSN / SAC',
                'rules' => 'trim|required'
            ),
            array(
                'field' => 'data[packing_qty]',
                'label' => 'Medicine Packing Quantity',
                'rules' => 'trim|required|numeric'
            ),
            array(
                'field' => 'data[mrp]',
                'label' => 'Medicine MRP',
                'rules' => 'trim|required|decimal'
            ),
            array(
                'field' => 'data[discount]',
                'label' => 'Medicine Customer Discount',
                'rules' => 'trim|required|numeric|less_than[30]'
            ),
            array(
                'field' => 'data[max_discount]',
                'label' => 'Medicine Store Discount',
                'rules' => 'trim|required|numeric|less_than[80]'
            ),
            array(
                'field' => 'data[title]',
                'label' => 'Title',
                'rules' => 'trim|max_length[70]'
            ),
            array(
                'field' => 'data[keywords]',
                'label' => 'Keywords',
                'rules' => 'trim|max_length[190]'
            )
        ),    
       'Vendors' => 
        array(
            array(
                'field' => 'Business[personal_pan]',
                'label' => 'PAN',
                'rules' => 'trim|required|valid_PAN'
            )
        ) 
    );
