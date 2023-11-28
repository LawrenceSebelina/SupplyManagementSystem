<?php 

    class functionClasses {

        private $host = "mysql:host=localhost;dbname=supplymanagementsystem";
        private $username = "root";
        private $password = "";
        protected $conn;

        protected function connect() {
            try {
                $this->conn = new PDO($this->host, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
                return $this->conn;  
            } catch (PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            } 
        }

        protected function disconnect() {
            $this->conn = null;
        }

        public function createAccount($userUniqueId, $userFirstName, $userLastName, $userEmail, $userPassword, $userCPassword) {
            // Check if passwords match
            if ($userPassword !== $userCPassword) {
                return "Passwords do not match";
            }
        
            $connection = $this->connect();
        
            // Check if email is already taken
            $stmt = $connection->prepare("SELECT COUNT(*) FROM users WHERE userEmail = :email");

            $stmt->bindParam(':email', $userEmail);
            $stmt->execute();
            $count = $stmt->fetchColumn();
        
            if ($count > 0) {
                return "Email is already taken";
            }
        
            // Hash the password
            $hashedPassword = password_hash($userPassword, PASSWORD_DEFAULT);
        
            // Insert the data into the database
            $stmt = $connection->prepare("INSERT INTO users (userId, userFirstName, userLastName, userEmail, userPassword) VALUES (:userId, :userFirstName, :userLastName, :userEmail, :userPassword)");

            $stmt->bindParam(':userId', $userUniqueId);
            $stmt->bindParam(':userFirstName', $userFirstName);
            $stmt->bindParam(':userLastName', $userLastName);
            $stmt->bindParam(':userEmail', $userEmail);
            $stmt->bindParam(':userPassword', $hashedPassword);
            $stmt->execute();
        
            if ($stmt) {
                return "success";
            } else {
                // return $userPassword;
                return "Failed";
            }

            $this->disconnect(); 
        }              

        // TODO: Login User Account

        public function loginAccount($userEmail, $userPassword) {
            if (empty($userEmail) && empty($userPassword)) {
                return "Email and password fields are empty";
            }
            
            if (empty($userEmail)) {
                return "Email field is empty";
            }
            
            if (empty($userPassword)) {
                return "Password field is empty";
            }            

            $userPassword = md5($_POST['userPassword']);

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userEmail = :email AND userPassword = :password");

            $stmt->bindParam(':email', $userEmail);
            $stmt->bindParam(':password', $userPassword);
            $stmt->execute();
            $data = $stmt->fetch(); 
            $datacount = $stmt->rowCount();
        
            // Hash the password with bcrypt and the generated salt
            // $hashedPassword = password_hash($userPassword, PASSWORD_BCRYPT, ['salt' => $salt, 'cost' => 12]);

            if ($datacount > 0) {
                // && password_verify($userPassword, $data['userPassword'])
                $this->setUserDetails($data);
                return "success";
            } else {
                // return $userPassword;
                return "Incorrect username or password";
            }

            $this->disconnect(); 
        }

        // TODO: End of Login User Account

        // TODO: Set User Details

        public function setUserDetails($data) {
            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['userDetails'] = array(
                "userId" => $data['userId'], 
                "userUId" => $data['userUId'], 
                "userFirstName" => $data['userFirstName'], 
                "userLastName" => $data['userLastName'], 
                "userPassword" => $data['userPassword'], 
                "userDateCreated" => $data['userDateCreated']
            );
    
            return $_SESSION['userDetails'];
        }

        // TODO: End of Set User Details

        // TODO: Get User Details

        public function getUserDetails() {
            if (!isset($_SESSION)) {
                session_start();
            }
    
            if (isset($_SESSION['userDetails'])) {
                return $_SESSION['userDetails'];
            } else {
                return null;
            }
            
        }

        // TODO: End of Get User Details

        // TODO: Logout User Account

        public function logoutAccount($userUId) {

            $connection = $this->connect();
            $stmt = $connection->prepare("SELECT * FROM users WHERE userUId = :userUId");
            $stmt->bindParam(':userUId', $userUId);
            $stmt->execute();
            $datacount = $stmt->rowCount();
            
            if ($datacount) {
                if (!isset($_SESSION)) {
                    session_start();
                }
            
                $_SESSION['userDetails'] = null;
                unset($_SESSION['userDetails']);
            
                session_destroy(); 
            }
            
        }

        // TODO: End of Logout User Account

        // TODO: Raw Materials All Functions 

            public function getRMMId() {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT id FROM materials ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function addRM($addRMUId, $addRMMId, $addRMMN, $addRMCat, $addRMUnit, $addRMQty, $addRMSupplier, $addRMDate) {

                if (empty($addRMUId) && empty($addRMMId) && empty($addRMMN) && empty($addRMCat) && empty($addRMUnit) && empty($addRMQty) && empty($addRMSupplier)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addRMUId)) {
                    return "Material Unique Id field is empty";
                }
                if (empty($addRMMId)) {
                    return "Material Id field is empty";
                }
                if (empty($addRMMN)) {
                    return "Material Name field is empty";
                }
                if (empty($addRMCat)) {
                    return "Category field is empty";
                }
                if (empty($addRMUnit)) {
                    return "Unit field is empty";
                }   
                if (empty($addRMQty)) {
                    return "Quantity field is empty";
                }      
                if (empty($addRMSupplier)) {
                    return "Supplier field is empty";
                }     
    
                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO materials (materialId, materialUId, materialName, materialCategory, materialUnit, materialQuantity, materialSupplier, materialDateCreated) VALUES (:materialId, :materialUId, :materialName, :materialCategory, :materialUnit, :materialQuantity, :materialQuantity, :materialDateCreated)");

                $stmt->bindParam(':materialId', $addRMMId);
                $stmt->bindParam(':materialUId', $addRMUId);
                $stmt->bindParam(':materialName', $addRMMN);
                $stmt->bindParam(':materialCategory', $addRMCat);
                $stmt->bindParam(':materialUnit', $addRMUnit);
                $stmt->bindParam(':materialQuantity', $addRMQty);
                $stmt->bindParam(':materialSupplier', $addRMSupplier);
                $stmt->bindParam(':materialDateCreated', $addRMDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }  

            public function getRM() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM materials WHERE materialStatus = :materialStatus ORDER BY id DESC");

                $materialStatus = 0;
                $stmt->bindParam(':materialStatus', $materialStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updateRM">
                                <i class="feather-edit"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deleteRM">
                                <i class="feather-trash"></i>
                            </a>
                        </div>';
    
                        $arrayDatas[] = array(
                            "materialId" => $data['materialId'],
                            "materialUId" => $data['materialUId'],
                            "materialName" => $data['materialName'],
                            "materialCategory" => $data['materialCategory'],
                            "materialUnit" => $data['materialUnit'],
                            "materialQuantity" => $data['materialQuantity'],
                            "materialSupplier" => $data['materialSupplier'],
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

            public function updateRM($updateRMMUId, $updateRMMId, $updateRMMN, $updateRMCat, $updateRMUnit, $updateRMQty, $updateRMSupplier, $updateRMDate) {

                if (empty($updateRMMUId) && empty($updateRMMId) && empty($updateRMMN) && empty($updateRMCat) && empty($updateRMUnit) && empty($updateRMQty) && empty($updateRMSupplier)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($updateRMMUId)) {
                    return "Material Unique Id field is empty";
                }
                if (empty($updateRMMId)) {
                    return "Material Id field is empty";
                }
                if (empty($updateRMMN)) {
                    return "Material Name field is empty";
                }
                if (empty($updateRMCat)) {
                    return "Category field is empty";
                }
                if (empty($updateRMUnit)) {
                    return "Unit field is empty";
                }   
                if (empty($updateRMQty)) {
                    return "Quantity field is empty";
                }      
                if (empty($updateRMSupplier)) {
                    return "Supplier field is empty";
                }     
    
                $connection = $this->connect();
            
                $stmt = $connection->prepare("UPDATE materials SET materialName = :materialName, materialCategory = :materialCategory, materialUnit = :materialUnit, materialQuantity = :materialQuantity, materialSupplier = :materialSupplier, materialDateCreated = :materialDateCreated WHERE materialId = :materialId AND materialUId = :materialUId");

                $stmt->bindParam(':materialId', $updateRMMId);
                $stmt->bindParam(':materialUId', $updateRMMUId);
                $stmt->bindParam(':materialName', $updateRMMN);
                $stmt->bindParam(':materialCategory', $updateRMCat);
                $stmt->bindParam(':materialUnit', $updateRMUnit);
                $stmt->bindParam(':materialQuantity', $updateRMQty);
                $stmt->bindParam(':materialSupplier', $updateRMSupplier);
                $stmt->bindParam(':materialDateCreated', $updateRMDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            } 

            public function deleteRM() {

                if (isset($_POST['btnDeleteRM'])) {
                    
                    $deleteRMMUId = $_POST['deleteRMMUId'];
                    $deleteRMMId = $_POST['deleteRMMId'];   
        
                    $connection = $this->connect();
                
                    $stmt = $connection->prepare("UPDATE materials SET materialStatus = :materialStatus WHERE materialId = :materialId AND materialUId = :materialUId");

                    $materialStatus = 1;
                    $stmt->bindParam(':materialId', $deleteRMMId);
                    $stmt->bindParam(':materialUId', $deleteRMMUId);
                    $stmt->bindParam(':materialStatus', $materialStatus);
                    $stmt->execute();
                
                    if ($stmt) {
                        echo "<script>
                            swal('Archived Success!', 'Raw material archived!', 'success').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    } else {
                        echo "<script>
                            swal('Failed!', 'Archived failed!', 'warning').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    }

                    $this->disconnect(); 
                }
            }

            public function getRMForSearch() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM materials WHERE materialStatus = :materialStatus ORDER BY id DESC");

                $materialStatus = 0;
                $stmt->bindParam(':materialStatus', $materialStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-primary-light text-primary me-2 addRMOrder">
                                <i class="feather-plus"></i>
                            </a>
                        </div>';
    
                        $arrayDatas[] = array(
                            "materialId" => $data['materialId'],
                            "materialUId" => $data['materialUId'],
                            "materialName" => $data['materialName'],
                            "materialCategory" => $data['materialCategory'],
                            "materialUnit" => $data['materialUnit'],
                            "materialQuantity" => $data['materialQuantity'],
                            "materialSupplier" => $data['materialSupplier'],
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

        // TODO: End of Raw Materials All Functions 
        
        // TODO: Categories All Functions 
            public function getCatCId() {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT id FROM categories ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function addCat($addCatCUId, $addCatCId, $addCatCN, $addCatDesc, $addCatDate) {

                if (empty($addCatCUId) && empty($addCatCId) && empty($addCatCN) && empty($addCatDesc)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addCatCUId)) {
                    return "Category Unique Id field is empty";
                }
                if (empty($addCatCId)) {
                    return "Category Id field is empty";
                }
                if (empty($addCatCN)) {
                    return "Category Name field is empty";
                }
                if (empty($addCatDesc)) {
                    return "Category Description field is empty";
                }    

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO categories (categoryId, categoryUId, categoryName, categoryDesc, categoryDateCreated) VALUES (:categoryId, :categoryUId, :categoryName, :categoryDesc, :categoryDateCreated)");

                $stmt->bindParam(':categoryId', $addCatCId);
                $stmt->bindParam(':categoryUId', $addCatCUId);
                $stmt->bindParam(':categoryName', $addCatCN);
                $stmt->bindParam(':categoryDesc', $addCatDesc);
                $stmt->bindParam(':categoryDateCreated', $addCatDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }  

            public function getCat() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM categories WHERE categoryStatus = :categoryStatus ORDER BY id DESC");

                $categoryStatus = 0;
                $stmt->bindParam(':categoryStatus', $categoryStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updateCat">
                                <i class="feather-edit"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deleteCat">
                                <i class="feather-trash"></i>
                            </a>
                        </div>';
    
                        $arrayDatas[] = array(
                            "categoryId" => $data['categoryId'],
                            "categoryUId" => $data['categoryUId'],
                            "categoryName" => $data['categoryName'],
                            "categoryDesc" => $data['categoryDesc'],
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

            public function updateCat($updateCatCUId, $updateCatCId, $updateCatCN, $updateCatDesc, $updateCatDate) {

                if (empty($updateCatCUId) && empty($updateCatCId) && empty($updateCatCN) && empty($updateCatDesc)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($updateCatCUId)) {
                    return "Category Unique Id field is empty";
                }
                if (empty($updateCatCId)) {
                    return "Category Id field is empty";
                }
                if (empty($updateCatCN)) {
                    return "Category Name field is empty";
                }
                if (empty($updateCatDesc)) {
                    return "Category Description field is empty";
                }    
    
                $connection = $this->connect();
            
                $stmt = $connection->prepare("UPDATE categories SET categoryName = :categoryName, categoryDesc = :categoryDesc, categoryDateCreated = :categoryDateCreated WHERE categoryId = :categoryId AND categoryUId = :categoryUId");

                $stmt->bindParam(':categoryId', $updateCatCId);
                $stmt->bindParam(':categoryUId', $updateCatCUId);
                $stmt->bindParam(':categoryName', $updateCatCN);
                $stmt->bindParam(':categoryDesc', $updateCatDesc);
                $stmt->bindParam(':categoryDateCreated', $updateCatDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            } 

            public function deleteCat() {

                if (isset($_POST['btnDeleteCat'])) {
                    
                    $deleteCatCUId = $_POST['deleteCatCUId'];
                    $deleteCatCId = $_POST['deleteCatCId'];   
        
                    $connection = $this->connect();
                
                    $stmt = $connection->prepare("UPDATE categories SET categoryStatus = :categoryStatus WHERE categoryId = :categoryId AND categoryUId = :categoryUId");

                    $categoryStatus = 1;
                    $stmt->bindParam(':categoryId', $deleteCatCId);
                    $stmt->bindParam(':categoryUId', $deleteCatCUId);
                    $stmt->bindParam(':categoryStatus', $categoryStatus);
                    $stmt->execute();
                
                    if ($stmt) {
                        echo "<script>
                            swal('Archived Success!', 'Categories archived!', 'success').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    } else {
                        echo "<script>
                            swal('Failed!', 'Archived failed!', 'warning').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    }

                    $this->disconnect(); 
                }
            }

            public function getCatDataOnly() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM categories WHERE categoryStatus = :categoryStatus ORDER BY id DESC");

                $categoryStatus = 0;
                $stmt->bindParam(':categoryStatus', $categoryStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if ($datacount > 0) {
                    return $datas;
                } else {
                    return false;
                }
                

    
                $this->disconnect(); 
            }

        // TODO: End of Categories All Functions 
        
        // TODO: Finish Products All Functions 
            public function addFinishProdQty($addFPQtyPUId, $addFPQtyPId, $addFPRQty, $addFPQty) {
                $connection = $this->connect();
                $results = [];

                $updateStmt = $connection->prepare("UPDATE finish_products SET finishProdQuantity = finishProdQuantity + :addFPQty WHERE finishProdUId = :finishProdUId");
                $updateStmt->bindParam(':addFPQty', $addFPQty);
                $updateStmt->bindParam(':finishProdUId', $addFPQtyPUId);
                $success = $updateStmt->execute();

                if ($success) {
                    $results[] = "Successfully updated finishProdQuantity.";

                    $stmt = $connection->prepare("SELECT * FROM finish_products_materials LEFT JOIN finish_products ON finish_products_materials.finishProdUId = finish_products.finishProdUId LEFT JOIN materials ON finish_products_materials.materialUId = materials.materialUId WHERE finish_products_materials.finishProdUId = :finishProdUId");
                    $stmt->bindParam(':finishProdUId', $addFPQtyPUId);
                    $stmt->execute();
                    $datas = $stmt->fetchAll();
                    $datacount = $stmt->rowCount();

                    if ($datacount > 0) {
                        foreach ($datas as $data) {
                            $materialQty = $data['materialQuantity'];
                            $materialName = $data['materialName'];
                            $finishProdMaterialQty = $data['finishProdMaterialQty'];
                            $materialQtyNeed = $addFPQty * $finishProdMaterialQty;
                            $newMaterialQty = $materialQty - $materialQtyNeed;
                            $materialUId = $data['materialUId'];

                            if ($newMaterialQty < 0) {
                                $results[] = "Not enough quantity for raw material " . $materialName . ". Remaining Quantity: " . $materialQty . ". Quantity Needed: " . $materialQtyNeed;
                            } else {
                                $stmt = $connection->prepare("UPDATE materials SET materialQuantity = :materialQuantity WHERE materialUId = :materialUId");
                                $stmt->bindParam(':materialUId', $materialUId);
                                $stmt->bindParam(':materialQuantity', $newMaterialQty);
                                $stmt->execute();
                                $results[] = "Successfully updated material quantity for " . $materialName . ".";
                            }
                        }

                        if ($stmt) {
                            $stmt = $connection->prepare("SELECT finishProdQuantity FROM finish_products WHERE finishProdUId = :finishProdUId");
                            $stmt->bindParam(':finishProdUId', $addFPQtyPUId);
                            $stmt->execute();
                            $remainingFinishProdQty = $stmt->fetch();
                            $datacount = $stmt->rowCount();

                            if ($datacount > 0) {
                                $newFinishProdQty = $remainingFinishProdQty['finishProdQuantity'];

                                $updateStmt = $connection->prepare("UPDATE finish_products SET finishProdQuantity = :finishProdQuantity WHERE finishProdUId = :finishProdUId");
                                $updateStmt->bindParam(':finishProdQuantity', $newFinishProdQty);
                                $updateStmt->bindParam(':finishProdUId', $addFPQtyPUId);
                                $updateStmt->execute();
                            }
                            $this->disconnect();
                            return $results;
                        }
                    } else {
                        $results[] = "No data found for the given finishProdUId.";
                        $this->disconnect();
                        return $results;
                    }
                } else {
                    $results[] = "Failed to update finishProdQuantity.";
                    $this->disconnect();
                    return $results;
                }
            }

            public function getFinishPRoductByFPUID($finishProductUId) {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM finish_products_materials LEFT JOIN finish_products ON finish_products_materials.finishProdUId = finish_products.finishProdUId LEFT JOIN materials ON finish_products_materials.materialUId = materials.materialUId WHERE finish_products_materials.finishProdUId = :finishProdUId");
                $stmt->bindParam(':finishProdUId', $finishProductUId);
                $stmt->execute();

                $data = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function getFinishProdPId() {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT id FROM finish_products ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function addFinishProd($addFPCUId, $addFPPId, $addFPPN, $addFPQty, $addFPDateFinished, $addFPDate) {

                if (empty($addFPCUId) && empty($addFPPId) && empty($addFPPN) && empty($addFPQty)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addFPCUId)) {
                    return "Finish Product Unique Id field is empty";
                }
                if (empty($addFPPId)) {
                    return "Finish Product Id field is empty";
                }
                if (empty($addFPPN)) {
                    return "Finish Product Name field is empty";
                }
                if (empty($addFPQty)) {
                    return "Finish Product Total Quantity field is empty";
                }     
                if (empty($addFPDateFinished)) {
                    return "Finish Product Date field is empty";
                }  

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO finish_products (finishProdId, finishProdUId, finishProdName, finishProdTotal, finishProdDateFinished, finishProdDateCreated) VALUES (:finishProdId, :finishProdUId, :finishProdName, :finishProdTotal, :finishProdDateFinished, :finishProdDateCreated)");

                $stmt->bindParam(':finishProdId', $addFPPId);
                $stmt->bindParam(':finishProdUId', $addFPCUId);
                $stmt->bindParam(':finishProdName', $addFPPN);
                $stmt->bindParam(':finishProdTotal', $addFPQty);
                $stmt->bindParam(':finishProdDateFinished', $addFPDateFinished);
                $stmt->bindParam(':finishProdDateCreated', $addFPDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }  

            public function getFinishProd() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM finish_products ORDER BY id DESC");
                // $stmt = $connection->prepare("SELECT * FROM finish_products WHERE finishProdStatus = :finishProdStatus ORDER BY id DESC");

                // $finishProdStatus = 0;
                // $stmt->bindParam(':finishProdStatus', $finishProdStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-primary-light text-primary me-2 addFPQty">
                                <i class="feather-plus"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm bg-danger-light text-danger minusFPQty">
                                <i class="feather-minus"></i>
                            </a>
                        </div>';
    
                        $arrayDatas[] = array(
                            "finishProdId" => "<a href='index.php?route=finish-products&finish-product=" . $data['finishProdUId'] . "' class='btn btn-sm bg-success-light text-success me-2'>" . $data['finishProdId'] . "</a>",
                            "finishProdUId" => $data['finishProdUId'],
                            "finishProdName" => $data['finishProdName'],
                            "finishProdTotalRawMaterials" => $data['finishProdTotalRawMaterials'],
                            "finishProdQuantity" => $data['finishProdQuantity'],
                            "finishProdDateCreated" =>  date('M. d, Y', strtotime($data['finishProdDateCreated'])),
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

            public function updateFinishProd($updateFPPUId, $updateFPPId, $updateFPPN, $updateFPQty, $updateFPDateFinished, $updateFPDate) {

                if (empty($updateFPPUId) && empty($updateFPPId) && empty($updateFPPN) && empty($updateFPQty) && empty($updateFPDateFinished)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($updateFPPUId)) {
                    return "Finish Product Unique Id field is empty";
                }
                if (empty($updateFPPId)) {
                    return "Finish Product Id field is empty";
                }
                if (empty($updateFPPN)) {
                    return "Finish Product Name field is empty";
                }
                if (empty($updateFPQty)) {
                    return "Finish Product Total Quantity field is empty";
                }    
                if (empty($updateFPDateFinished)) {
                    return "Finish Product Date field is empty";
                }  
    
                $connection = $this->connect();
            
                $stmt = $connection->prepare("UPDATE finish_products SET finishProdName = :finishProdName, finishProdTotal = :finishProdTotal, finishProdDateFinished = :finishProdDateFinished, finishProdDateCreated = :finishProdDateCreated WHERE finishProdId = :finishProdId AND finishProdUId = :finishProdUId");

                $stmt->bindParam(':finishProdId', $updateFPPId);
                $stmt->bindParam(':finishProdUId', $updateFPPUId);
                $stmt->bindParam(':finishProdName', $updateFPPN);
                $stmt->bindParam(':finishProdTotal', $updateFPQty);
                $stmt->bindParam(':finishProdDateFinished', $updateFPDateFinished);
                $stmt->bindParam(':finishProdDateCreated', $updateFPDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            } 

            public function deleteFinishProd() {

                if (isset($_POST['btnDeleteFP'])) {
                    
                    $deleteFPPUId = $_POST['deleteFPPUId'];
                    $deleteFPPId = $_POST['deleteFPPId'];   
        
                    $connection = $this->connect();
                
                    $stmt = $connection->prepare("UPDATE finish_products SET finishProdStatus = :finishProdStatus WHERE finishProdId = :finishProdId AND finishProdUId = :finishProdUId");

                    $finishProdStatus = 1;
                    $stmt->bindParam(':finishProdId', $deleteFPPId);
                    $stmt->bindParam(':finishProdUId', $deleteFPPUId);
                    $stmt->bindParam(':finishProdStatus', $finishProdStatus);
                    $stmt->execute();
                
                    if ($stmt) {
                        echo "<script>
                            swal('Archived Success!', 'Finish product archived!', 'success').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    } else {
                        echo "<script>
                            swal('Failed!', 'Archived failed!', 'warning').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    }

                    $this->disconnect(); 
                }
            }
        // TODO: End of Finish Products All Functions 

        // TODO: Supplies All Functions 
            public function getSupplySId() {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT id FROM supplies ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function addSupply($addSupplySUId, $addSupplySId, $addSupplyRM, $addSupplyCat, $addSupplyUnit, $addSupplyStock, $addSupplyDate) {

                if (empty($addSupplySUId) && empty($addSupplySId) && empty($addSupplyRM) && empty($addSupplyCat) && empty($addSupplyUnit) && empty($addSupplyStock)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addSupplySUId)) {
                    return "Supply Unique Id field is empty";
                }
                if (empty($addSupplySId)) {
                    return "Supply Id field is empty";
                }
                if (empty($addSupplyRM)) {
                    return "Supply Raw Material Name field is empty";
                }
                if (empty($addSupplyCat)) {
                    return "Supply Category field is empty";
                }  
                if (empty($addSupplyUnit)) {
                    return "Supply Unit field is empty";
                }    
                if (empty($addSupplyStock)) {
                    return "Supply Stock Available field is empty";
                }    

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO supplies (supplyId, supplyUId, supplyRawMaterial, supplyCategory, supplyUnit, supplyStock, supplyDateCreated) VALUES (:supplyId, :supplyUId, :supplyRM, :supplyCat, :supplyUnit, :supplyStock, :supplyDateCreated)");

                $stmt->bindParam(':supplyId', $addSupplySId);
                $stmt->bindParam(':supplyUId', $addSupplySUId);
                $stmt->bindParam(':supplyRM', $addSupplyRM);
                $stmt->bindParam(':supplyCat', $addSupplyCat);
                $stmt->bindParam(':supplyUnit', $addSupplyUnit);
                $stmt->bindParam(':supplyStock', $addSupplyStock);
                $stmt->bindParam(':supplyDateCreated', $addSupplyDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }

            public function getSupply() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM supplies WHERE supplyStatus = :supplyStatus ORDER BY id DESC");

                $supplyStatus = 0;
                $stmt->bindParam(':supplyStatus', $supplyStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updateSupply">
                                <i class="feather-edit"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deleteSupply">
                                <i class="feather-trash"></i>
                            </a>
                        </div>';
    
                        $arrayDatas[] = array(
                            "supplyId" => $data['supplyId'],
                            "supplyUId" => $data['supplyUId'],
                            "supplyRawMaterial" => $data['supplyRawMaterial'],
                            "supplyCategory" => $data['supplyCategory'],
                            "supplyUnit" => $data['supplyUnit'],
                            "supplyStock" => $data['supplyStock'],
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

            public function updateSupply($updateSuppySUId, $updateSupplySId, $updateSupplyRM, $updateSupplyCat, $updateSupplyUnit, $updateSupplyStock, $updateSupplyDate) {

                if (empty($updateSuppySUId) && empty($updateSupplySId) && empty($updateSupplyRM) && empty($updateSupplyCat) && empty($updateSupplyUnit) && empty($updateSupplyStock)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($updateSuppySUId)) {
                    return "Supply Unique Id field is empty";
                }
                if (empty($updateSupplySId)) {
                    return "Supply Id field is empty";
                }
                if (empty($updateSupplyRM)) {
                    return "Supply Raw Material Name field is empty";
                }
                if (empty($updateSupplyCat)) {
                    return "Supply Category field is empty";
                }    
                if (empty($updateSupplyUnit)) {
                    return "Supply Unit field is empty";
                }  
                if (empty($updateSupplyStock)) {
                    return "Supply Stock Available field is empty";
                }
    
                $connection = $this->connect();
            
                $stmt = $connection->prepare("UPDATE supplies SET supplyRawMaterial = :supplyRM, supplyCategory = :supplyCat, supplyUnit = :supplyUnit, supplyStock = :supplyStock, supplyDateCreated = :supplyDateCreated WHERE supplyId = :supplyId AND supplyUId = :supplyUId");

                $stmt->bindParam(':supplyId', $updateSupplySId);
                $stmt->bindParam(':supplyUId', $updateSuppySUId);
                $stmt->bindParam(':supplyRM', $updateSupplyRM);
                $stmt->bindParam(':supplyCat', $updateSupplyCat);
                $stmt->bindParam(':supplyUnit', $updateSupplyUnit);
                $stmt->bindParam(':supplyStock', $updateSupplyStock);
                $stmt->bindParam(':supplyDateCreated', $updateSupplyDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            } 

            public function deleteSupply() {

                if (isset($_POST['btnDeleteSupply'])) {
                    
                    $deleteSupplySUId = $_POST['deleteSupplySUId'];
                    $deleteSupplySId = $_POST['deleteSupplySId'];   
        
                    $connection = $this->connect();
                
                    $stmt = $connection->prepare("UPDATE supplies SET supplyStatus = :supplyStatus WHERE supplyId = :supplyId AND supplyUId = :supplyUId");

                    $supplyStatus = 1;
                    $stmt->bindParam(':supplyId', $deleteSupplySId);
                    $stmt->bindParam(':supplyUId', $deleteSupplySUId);
                    $stmt->bindParam(':supplyStatus', $supplyStatus);
                    $stmt->execute();
                
                    if ($stmt) {
                        echo "<script>
                            swal('Archived Success!', 'Supply archived!', 'success').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    } else {
                        echo "<script>
                            swal('Failed!', 'Archived failed!', 'warning').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    }

                    $this->disconnect(); 
                }
            }
        // TODO: End of Supplies All Functions

        // TODO: Purchase Orders All Functions 
            public function getPurchaseOrderPOId() {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT id FROM purchase_orders ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function addPurchaseOrder($addPOPOUId, $addPOPOId, $addPONo, $addPORM, $addPODateReceived, $addPOSupplier, $addPOQuantity, $addPOPrice, $addPODate) {

                if (empty($addPOPOUId) && empty($addPOPOId) && empty($addPONo) && empty($addPORM) && empty($addPODateReceived) && empty($addPOSupplier) && empty($addPOQuantity) && empty($addPOPrice)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addPOPOUId)) {
                    return "Purchase Order Unique Id field is empty";
                }
                if (empty($addPOPOId)) {
                    return "Purchase Order Id field is empty";
                }
                if (empty($addPONo)) {
                    return "Purchase Order Number field is empty";
                }
                if (empty($addPORM)) {
                    return "Purchase Order Raw Material Name field is empty";
                }  
                if (empty($addPODateReceived)) {
                    return "Purchase Order Raw Material Name field is empty";
                }  
                if (empty($addPOSupplier)) {
                    return "Purchase Order Supplier field is empty";
                }
                if (empty($addPOQuantity)) {
                    return "Purchase Order Quantity field is empty";
                }
                if (empty($addPOPrice)) {
                    return "Purchase Order Price field is empty";
                }   

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO purchase_orders (purchaseOrderId, purchaseOrderUId, purchaseOrderNo, purchaseOrderRawMaterial, 	purchaseOrderDateReceived, purchaseOrderSupplier, purchaseOrderQuantity, 	purchaseOrderPrice, purchaseOrderDateCreated) VALUES (:purchaseOrderId, :purchaseOrderUId, :purchaseOrderNo, :purchaseOrderRawMaterial, :purchaseOrderDateReceived, :purchaseOrderSupplier, :purchaseOrderQuantity, :purchaseOrderPrice, :purchaseOrderDateCreated)");

                $stmt->bindParam(':purchaseOrderId', $addPOPOId);
                $stmt->bindParam(':purchaseOrderUId', $addPOPOUId);
                $stmt->bindParam(':purchaseOrderNo', $addPONo);
                $stmt->bindParam(':purchaseOrderRawMaterial', $addPORM);
                $stmt->bindParam(':purchaseOrderDateReceived', $addPODateReceived);
                $stmt->bindParam(':purchaseOrderSupplier', $addPOSupplier);
                $stmt->bindParam(':purchaseOrderQuantity', $addPOQuantity);
                $stmt->bindParam(':purchaseOrderPrice', $addPOPrice);
                $stmt->bindParam(':purchaseOrderDateCreated', $addPODate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }  

            public function getPurchaseOrder() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM purchase_orders WHERE purchaseOrderStatus = :purchaseOrderStatus ORDER BY id DESC");

                $purchaseOrderStatus = 0;
                $stmt->bindParam(':purchaseOrderStatus', $purchaseOrderStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updatePO">
                                <i class="feather-edit"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deletePO">
                                <i class="feather-trash"></i>
                            </a>
                        </div>';
    
                        $arrayDatas[] = array(
                            "purchaseOrderId" => $data['purchaseOrderId'],
                            "purchaseOrderUId" => $data['purchaseOrderUId'],
                            "purchaseOrderNo" => $data['purchaseOrderNo'],
                            "purchaseOrderRawMaterial" => $data['purchaseOrderRawMaterial'],
                            "purchaseOrderDateReceived" => $data['purchaseOrderDateReceived'],
                            "purchaseOrderSupplier" => $data['purchaseOrderSupplier'],
                            "purchaseOrderQuantity" => $data['purchaseOrderQuantity'],
                            "purchaseOrderPrice" => $data['purchaseOrderPrice'],
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

            public function updatePurchaseOrder($updatePOPOUId, $updatePOPOId, $updatePONo, $updatePORM, $updatePODateReceived, $updatePOSupplier, $updatePOQuantity, $updatePOPrice, $updatePODate) {

                if (empty($updatePOPOUId) && empty($updatePOPOId) && empty($updatePONo) && empty($updatePORM) && empty($updatePODateReceived) && empty($updatePOSupplier) && empty($updatePOQuantity) && empty($updatePOPrice)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($updatePOPOUId)) {
                    return "Purchase Order Unique Id field is empty";
                }
                if (empty($updatePOPOId)) {
                    return "Purchase Order Id field is empty";
                }
                if (empty($updatePONo)) {
                    return "Purchase Order Number field is empty";
                }
                if (empty($updatePORM)) {
                    return "Purchase Order Raw Material Name field is empty";
                }  
                if (empty($updatePODateReceived)) {
                    return "Purchase Order Raw Material Name field is empty";
                }  
                if (empty($updatePOSupplier)) {
                    return "Purchase Order Supplier field is empty";
                }
                if (empty($updatePOQuantity)) {
                    return "Purchase Order Quantity field is empty";
                }
                if (empty($updatePOPrice)) {
                    return "Purchase Order Price field is empty";
                }   

                $connection = $this->connect();

                $stmt = $connection->prepare("UPDATE purchase_orders SET purchaseOrderNo = :purchaseOrderNo, purchaseOrderRawMaterial = :purchaseOrderRawMaterial, purchaseOrderDateReceived = :purchaseOrderDateReceived, purchaseOrderSupplier = :purchaseOrderSupplier, purchaseOrderQuantity = :purchaseOrderQuantity, purchaseOrderPrice = :purchaseOrderPrice, purchaseOrderDateCreated = :purchaseOrderDateCreated WHERE purchaseOrderId = :purchaseOrderId AND purchaseOrderUId = :purchaseOrderUId");

                $stmt->bindParam(':purchaseOrderId', $updatePOPOId);
                $stmt->bindParam(':purchaseOrderUId', $updatePOPOUId);
                $stmt->bindParam(':purchaseOrderNo', $updatePONo);
                $stmt->bindParam(':purchaseOrderRawMaterial', $updatePORM);
                $stmt->bindParam(':purchaseOrderDateReceived', $updatePODateReceived);
                $stmt->bindParam(':purchaseOrderSupplier', $updatePOSupplier);
                $stmt->bindParam(':purchaseOrderQuantity', $updatePOQuantity);
                $stmt->bindParam(':purchaseOrderPrice', $updatePOPrice);
                $stmt->bindParam(':purchaseOrderDateCreated', $updatePODate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }  

            public function deletePurchaseOrder() {

                if (isset($_POST['btnDeletePO'])) {
                    
                    $deletePOPOUId = $_POST['deletePOPOUId'];
                    $deletePOPOID = $_POST['deletePOPOID'];   
        
                    $connection = $this->connect();
                
                    $stmt = $connection->prepare("UPDATE purchase_orders SET purchaseOrderStatus = :purchaseOrderStatus WHERE purchaseOrderId = :purchaseOrderId AND purchaseOrderUId = :purchaseOrderUId");

                    $purchaseOrderStatus = 1;
                    $stmt->bindParam(':purchaseOrderId', $deletePOPOID);
                    $stmt->bindParam(':purchaseOrderUId', $deletePOPOUId);
                    $stmt->bindParam(':purchaseOrderStatus', $purchaseOrderStatus);
                    $stmt->execute();
                
                    if ($stmt) {
                        echo "<script>
                            swal('Archived Success!', 'Purchase order archived!', 'success').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    } else {
                        echo "<script>
                            swal('Failed!', 'Archived failed!', 'warning').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    }

                    $this->disconnect(); 
                }
            }
        // TODO: End of Purchase Orders All Functions

        // TODO: Order Deliveries All Functions 
            public function getOrderDeliveryByODUID($orderDeliveryUId) {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM order_deliveries_materials LEFT JOIN order_deliveries ON order_deliveries_materials.orderDeliveryUId = order_deliveries.orderDeliveryUId LEFT JOIN materials ON order_deliveries_materials.materialUId = materials.materialUId WHERE order_deliveries_materials.orderDeliveryUId = :orderDeliveryUId");
                $stmt->bindParam(':orderDeliveryUId', $orderDeliveryUId);
                $stmt->execute();

                $data = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function getOrderDeliveryODId() {
                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT id FROM order_deliveries ORDER BY id DESC LIMIT 1");
                $stmt->execute();
                $data = $stmt->fetch(); 
                $datacount = $stmt->rowCount();

                if ($datacount > 0) {
                    return $data;
                } else {
                    return false;
                }

                $this->disconnect(); 
            }

            public function addOrderDelivery($addODODUId, $addODODId, $addODNo, $addODPN, $addODCustomer, $addODTO, $addODSDate, $addODEDate, $addODStatus, $addODDate) {

                if (empty($addODODUId) && empty($addODODId) && empty($addODNo) && empty($addODPN) && empty($addODCustomer) && empty($addODTO) && empty($addODSDate) && empty($addODEDate) && empty($addODStatus)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addODODUId)) {
                    return "Order Delivery Unique Id field is empty";
                }
                if (empty($addODODId)) {
                    return "Order Delivery Id field is empty";
                }
                if (empty($addODNo)) {
                    return "Order Delivery Number field is empty";
                }
                if (empty($addODPN)) {
                    return "Order Delivery Product Name field is empty";
                }  
                if (empty($addODCustomer)) {
                    return "Order Delivery Customer Name field is empty";
                }  
                if (empty($addODTO)) {
                    return "Order Delivery Total Order field is empty";
                }
                if (empty($addODSDate)) {
                    return "Order Delivery Schedule Date field is empty";
                }
                if (empty($addODEDate)) {
                    return "Order Delivery Expected Date field is empty";
                }
                if (empty($addODStatus)) {
                    return "Order Delivery Order Status field is empty";
                }    

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO order_deliveries (orderDeliveryId, orderDeliveryUId, orderDeliveryOrderNo, orderDeliveryProdName, orderDeliveryCustomer, orderDeliveryTotalOrder, orderDeliverySchedDate, orderDeliveryExpectedDate, orderDeliveryOrderStatus, orderDeliveryDateCreated) VALUES (:orderDeliveryId, :orderDeliveryUId, :orderDeliveryOrderNo, :orderDeliveryProdName, :orderDeliveryCustomer, :orderDeliveryTotalOrder, :orderDeliverySchedDate, :orderDeliveryExpectedDate, :orderDeliveryOrderStatus, :orderDeliveryDateCreated)");

                $stmt->bindParam(':orderDeliveryId', $addODODId);
                $stmt->bindParam(':orderDeliveryUId', $addODODUId);
                $stmt->bindParam(':orderDeliveryOrderNo', $addODNo);
                $stmt->bindParam(':orderDeliveryProdName', $addODPN);
                $stmt->bindParam(':orderDeliveryCustomer', $addODCustomer);
                $stmt->bindParam(':orderDeliveryTotalOrder', $addODTO);
                $stmt->bindParam(':orderDeliverySchedDate', $addODSDate);
                $stmt->bindParam(':orderDeliveryExpectedDate', $addODEDate);
                $stmt->bindParam(':orderDeliveryOrderStatus', $addODStatus);
                $stmt->bindParam(':orderDeliveryDateCreated', $addODDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }

            public function getOrderDelivery() {

                $connection = $this->connect();
                $stmt = $connection->prepare("SELECT * FROM order_deliveries ORDER BY id DESC");

                // $stmt = $connection->prepare("SELECT * FROM order_deliveries WHERE orderDeliveryStatus = :orderDeliveryStatus ORDER BY id DESC");

                // $orderDeliveryStatus = 0;
                // $stmt->bindParam(':orderDeliveryStatus', $orderDeliveryStatus);
                $stmt->execute();
                $datas = $stmt->fetchAll(); 
                $datacount = $stmt->rowCount();
    
                if($datacount > 0) {
                    foreach ($datas as $data) { 
                        $actions = 
                        '<div class="actions">
                            <a href="javascript:;" class="btn btn-sm bg-warning-light text-warning me-2 updateOD">
                                <i class="feather-edit"></i>
                            </a>
                            <a href="javascript:;" class="btn btn-sm bg-danger-light text-danger deleteOD">
                                <i class="feather-trash"></i>
                            </a>
                        </div>';

                        $arrayDatas[] = array(
                            "orderDeliveryId" => "<a href='index.php?route=order-deliveries&order=" . $data['orderDeliveryUId'] . "' class='btn btn-sm bg-success-light text-success me-2'>" . $data['orderDeliveryId'] . "</a>",
                            "orderDeliveryUId" => $data['orderDeliveryUId'],
                            "orderDeliveryOrderNo" => $data['orderDeliveryOrderNo'],
                            "orderDeliverySupplier" => $data['orderDeliverySupplier'],
                            "orderDeliveryTotalProd" => $data['orderDeliveryTotalProd'],
                            "orderDeliveryDateCreated" => $data['orderDeliveryDateCreated'],
                            "actions" => $actions
                        );
    
                    }
                    
                }
                
                $jsonData['data'] = $arrayDatas ?? [];
                return $jsonData;
    
                $this->disconnect(); 
            }

            public function updateOrderDelivery($updateODODUId, $updateODODId, $updateODNo, $updateODPN, $updateODCustomer, $updateODTO, $updateODSDate, $updateODEDate, $updateODStatus, $updateODDate) {

                if (empty($updateODODUId) && empty($updateODODId) && empty($updateODNo) && empty($updateODPN) && empty($updateODCustomer) && empty($updateODTO) && empty($updateODSDate) && empty($updateODEDate) && empty($updateODStatus)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($updateODODUId)) {
                    return "Order Delivery Unique Id field is empty";
                }
                if (empty($updateODODId)) {
                    return "Order Delivery Id field is empty";
                }
                if (empty($updateODNo)) {
                    return "Order Delivery Number field is empty";
                }
                if (empty($updateODPN)) {
                    return "Order Delivery Product Name field is empty";
                }  
                if (empty($updateODCustomer)) {
                    return "Order Delivery Customer Name field is empty";
                }  
                if (empty($updateODTO)) {
                    return "Order Delivery Total Order field is empty";
                }
                if (empty($updateODSDate)) {
                    return "Order Delivery Schedule Date field is empty";
                }
                if (empty($updateODEDate)) {
                    return "Order Delivery Expected Date field is empty";
                }
                if (empty($updateODStatus)) {
                    return "Order Delivery Order Status field is empty";
                }

                $connection = $this->connect();

                $stmt = $connection->prepare("UPDATE order_deliveries SET orderDeliveryOrderNo = :orderDeliveryOrderNo, orderDeliveryProdName = :orderDeliveryProdName, orderDeliveryCustomer = :orderDeliveryCustomer, orderDeliveryTotalOrder = :orderDeliveryTotalOrder, orderDeliverySchedDate = :orderDeliverySchedDate, orderDeliveryExpectedDate = :orderDeliveryExpectedDate, orderDeliveryOrderStatus = :orderDeliveryOrderStatus, orderDeliveryDateCreated = :orderDeliveryDateCreated WHERE orderDeliveryId = :orderDeliveryId AND orderDeliveryUId = :orderDeliveryUId");

                $stmt->bindParam(':orderDeliveryId', $updateODODId);
                $stmt->bindParam(':orderDeliveryUId', $updateODODUId);
                $stmt->bindParam(':orderDeliveryOrderNo', $updateODNo);
                $stmt->bindParam(':orderDeliveryProdName', $updateODPN);
                $stmt->bindParam(':orderDeliveryCustomer', $updateODCustomer);
                $stmt->bindParam(':orderDeliveryTotalOrder', $updateODTO);
                $stmt->bindParam(':orderDeliverySchedDate', $updateODSDate);
                $stmt->bindParam(':orderDeliveryExpectedDate', $updateODEDate);
                $stmt->bindParam(':orderDeliveryOrderStatus', $updateODStatus);
                $stmt->bindParam(':orderDeliveryDateCreated', $updateODDate);
                $stmt->execute();
            
                if ($stmt) {
                    return "success";
                } else {
                    return "failed";
                }

                $this->disconnect(); 
            }  

            public function deleteOrderDelivery() {

                if (isset($_POST['btnDeletePO'])) {
                    
                    $deleteODODUID = $_POST['deleteODODUID'];
                    $deleteODODID = $_POST['deleteODODID'];   
        
                    $connection = $this->connect();
                
                    $stmt = $connection->prepare("UPDATE order_deliveries SET orderDeliveryStatus = :orderDeliveryStatus WHERE orderDeliveryId = :orderDeliveryId AND orderDeliveryUId = :orderDeliveryUId");

                    $orderDeliveryStatus = 1;
                    $stmt->bindParam(':orderDeliveryId', $deleteODODID);
                    $stmt->bindParam(':orderDeliveryUId', $deleteODODUID);
                    $stmt->bindParam(':orderDeliveryStatus', $orderDeliveryStatus);
                    $stmt->execute();
                
                    if ($stmt) {
                        echo "<script>
                            swal('Archived Success!', 'Order delivery archived!', 'success').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    } else {
                        echo "<script>
                            swal('Failed!', 'Archived failed!', 'warning').then(function() {
                                window.location.href = window.location.href;
                            });
                        </script>";
                    }

                    $this->disconnect(); 
                }
            }
        // TODO: End of Order Deliveries All Functions   

        // TODO: Add Order Deliveries with Raw Materials Lists

            public function addOrderDeliveryWithRawMaterials($addODLODUId, $addODLODId, $addODLNo, $addODLSupplier, $addODLMaterialIds, $addODLMaterialQtys, $orderMaterialDateCreated) {

                if (empty($addODLODUId) && empty($addODLODId) && empty($addODLNo) && empty($addODLSupplier) && empty($addODLMaterialIds)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addODLODUId)) {
                    return "Order Delivery Unique Id field is empty";
                }
                if (empty($addODLODId)) {
                    return "Order Delivery Id field is empty";
                }
                if (empty($addODLNo)) {
                    return "Order Delivery Number field is empty";
                }
                if (empty($addODLSupplier)) {
                    return "Order Delivery Supplier field is empty";
                }
                if (empty($addODLMaterialIds)) {
                    return "Order Delivery Raw Materials table is empty";
                }   
                if (empty($addODLMaterialQtys)) {
                    return "There is Raw Material No Quantity table is empty";
                }   

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO order_deliveries (orderDeliveryId, orderDeliveryUId, orderDeliveryOrderNo, orderDeliverySupplier, orderDeliveryTotalProd, orderDeliveryDateCreated) VALUES (:orderDeliveryId, :orderDeliveryUId, :orderDeliveryOrderNo, :orderDeliverySupplier, :orderDeliveryTotalProd, :orderDeliveryDateCreated)");

                $orderDeliveryTotalProd = count($addODLMaterialIds);
                $stmt->bindParam(':orderDeliveryUId', $addODLODUId);
                $stmt->bindParam(':orderDeliveryId', $addODLODId);
                $stmt->bindParam(':orderDeliveryOrderNo', $addODLNo);
                $stmt->bindParam(':orderDeliverySupplier', $addODLSupplier);
                $stmt->bindParam(':orderDeliveryTotalProd', $orderDeliveryTotalProd);
                $stmt->bindParam(':orderDeliveryDateCreated', $orderMaterialDateCreated);
                $stmt->execute();

                if ($stmt) {
                    $connection = $this->connect();

                    for ($i = 0; $i < count($addODLMaterialIds); $i++) {
                        $addODLMaterialId = $addODLMaterialIds[$i];
                        $addODLMaterialQty = $addODLMaterialQtys[$i];
                    
                        $connection = $this->connect();
                    
                        $stmt = $connection->prepare("SELECT materialQuantity FROM materials WHERE materialUId = :materialUId");
                        $stmt->bindParam(':materialUId', $addODLMaterialId);
                        $stmt->execute();
                        
                        $existingQty = $stmt->fetchColumn();
                    
                        if ($existingQty !== false) {
                            $newQty = $existingQty + $addODLMaterialQty;
                    
                            $stmt = $connection->prepare("UPDATE materials SET materialQuantity = :materialQuantity WHERE materialUId = :materialUId");
                            $stmt->bindParam(':materialUId', $addODLMaterialId);
                            $stmt->bindParam(':materialQuantity', $newQty);
                            $stmt->execute();
                    
                            if ($stmt->rowCount() > 0) {
                                $stmt = $connection->prepare("INSERT INTO order_deliveries_materials (orderMaterialUId, orderDeliveryUId, materialUId, orderMaterialQty, orderMaterialDateCreated) VALUES (:orderMaterialUId, :orderDeliveryUId, :materialUId, :orderMaterialQty, :orderMaterialDateCreated)");
                    
                                $stmt->bindParam(':orderMaterialUId', $addODLODUId);
                                $stmt->bindParam(':orderDeliveryUId', $addODLODUId);
                                $stmt->bindParam(':materialUId', $addODLMaterialId);
                                $stmt->bindParam(':orderMaterialQty', $addODLMaterialQty);
                                $stmt->bindParam(':orderMaterialDateCreated', $orderMaterialDateCreated);
                                $stmt->execute();
                            }
                        }
                    }                    

                    if ($stmt) {
                        return "success";
                    } else {
                        return "failed";
                    }

                }

                $this->disconnect(); 

            }

        // TODO: End of Add Order Deliveries with Raw Materials Lists

        // TODO: Add Finish Product with Raw Materials Lists

            public function addFinishProductWithRawMaterials($addFPLFPUId, $addFPPId, $addFPPN, $addFPLMaterialIds, $addFPLMaterialQtys, $finishProdMaterialsDateCreated) {

                if (empty($addFPLFPUId) && empty($addFPPId) && empty($addFPPN) && empty($addFPLMaterialIds) && empty($addFPLMaterialQtys)) {
                    return "Some of the fields are empty";
                }
                
                if (empty($addFPLFPUId)) {
                    return "Finish Product Unique Id field is empty";
                }
                if (empty($addFPPId)) {
                    return "Finish Product Id field is empty";
                }
                if (empty($addFPPN)) {
                    return "Finish Product Name field is empty";
                }
                if (empty($addFPLMaterialIds)) {
                    return "Finish Product Raw Materials table is empty";
                }   
                if (empty($addFPLMaterialQtys)) {
                    return "There is Raw Material No Quantity table is empty";
                }   

                $connection = $this->connect();
            
                $stmt = $connection->prepare("INSERT INTO finish_products (finishProdId, finishProdUId, finishProdName, finishProdTotalRawMaterials, finishProdDateCreated) VALUES (:finishProdId, :finishProdUId, :finishProdName, :finishProdTotalRawMaterials, :finishProdDateCreated)");

                $finishProductTotalRawMaterials = count($addFPLMaterialIds);
                $stmt->bindParam(':finishProdUId', $addFPLFPUId);
                $stmt->bindParam(':finishProdId', $addFPPId);
                $stmt->bindParam(':finishProdName', $addFPPN);
                $stmt->bindParam(':finishProdTotalRawMaterials', $finishProductTotalRawMaterials);
                $stmt->bindParam(':finishProdDateCreated', $finishProdMaterialsDateCreated);
                $stmt->execute();

                if ($stmt) {
                    $connection = $this->connect();

                    for ($i = 0; $i < count($addFPLMaterialIds); $i++) {
                        $addFPLMaterialId = $addFPLMaterialIds[$i];
                        $addFPLMaterialQty = $addFPLMaterialQtys[$i];
                    
                        $connection = $this->connect();

                        $stmt = $connection->prepare("INSERT INTO finish_products_materials (finishProdMaterialUId, finishProdUId, materialUId, finishProdMaterialQty, finishProdMaterialDateCreated) VALUES (:finishProdMaterialUId, :finishProdUId, :materialUId, :finishProdQty, :finishProdDateCreated)");
            
                        $stmt->bindParam(':finishProdMaterialUId', $addFPLFPUId);
                        $stmt->bindParam(':finishProdUId', $addFPLFPUId);
                        $stmt->bindParam(':materialUId', $addFPLMaterialId);
                        $stmt->bindParam(':finishProdQty', $addFPLMaterialQty);
                        $stmt->bindParam(':finishProdDateCreated', $finishProdMaterialsDateCreated);
                        $stmt->execute();
                        
                    }                    

                    if ($stmt) {
                        return "success";
                    } else {
                        return "failed";
                    }

                }

                $this->disconnect(); 

            }

        // TODO: End of Add Finish Product with Raw Materials Lists
    }

    $functionClass = new functionClasses();
?>
