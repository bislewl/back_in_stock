SET @configuration_group_id=0;
SELECT @configuration_group_id:=configuration_group_id
FROM configuration
WHERE configuration_key= 'BACK_IN_STOCK_VERSION'
LIMIT 1;
DELETE FROM configuration WHERE configuration_group_id = @configuration_group_id AND configuration_group_id <> 0;
DELETE FROM configuration_group WHERE configuration_group_id = @configuration_group_id AND configuration_group_id <> 0;

#Zen Cart v1.5.0+ only Below! Skip if using an older version!
DELETE FROM admin_pages WHERE page_key = 'configBackInStock' LIMIT 1;
DELETE FROM admin_pages WHERE page_key = 'toolsBackInStock' LIMIT 1;
