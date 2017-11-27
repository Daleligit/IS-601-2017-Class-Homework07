<?php
    namespace classes;
    use classes\collection as nameSpcOne, classes\model as nameSpcTwo;
    class pageFunctions {
        static public function getRequestPage () {
            $pageRequest = 'homepage';
            if (isset($_REQUEST['page'])) {
                $pageRequest = $_REQUEST['page'];
            }
            return $pageRequest;
        }
        static public function runPageFunction ($page) {
            if($_SERVER['REQUEST_METHOD'] == 'GET') {
                $page->get();
            } else {
                $page->post();
            }
        }
        static public function changePage($linkUrl) {
            header('Location: ' . $linkUrl);
        }
        static public function runMethod ($method,$tableName,$id) {
            switch ($method) {
                case 'findAll';
                    switch ($tableName) {
                        case 'accounts';
                            $result = nameSpcOne\accounts::findAll();
                            break;
                        case 'todos';
                            $result = nameSpcOne\todos::findAll();
                            break;
                    }
                    $result = table::createTable($result);
                    break;
                case 'findOne';
                    if (!empty($id)) {
                        switch ($tableName) {
                            case 'accounts';
                                $result = nameSpcOne\accounts::findOne($id);
                                break;
                            case 'todos';
                                $result = nameSpcOne\todos::findOne($id);
                                break;
                        }
                        if (!empty($result)) {
                            $result = table::createTable($result);
                        } else {
                            $result = htmlTags::changeRow('There is not a line with id = ' . $id);
                        }
                    } else {
                        $result = htmlTags::changeRow('Please input an ID');
                    }
                    break;
                case 'delete';
                    if (!empty($id)) {
                        switch ($tableName) {
                            case 'accounts';
                                $table = nameSpcTwo\accounts::create();
                                break;
                            case 'todos';
                                $table = nameSpcTwo\todos::create();
                                break;
                        }
                        $table->id = $id;
                        $result = $table->delete();
                    } else {
                        $result = htmlTags::changeRow('Please input an ID');
                    }
                    break;
                case 'save';
                    if (!empty($id)) {
                        switch ($tableName) {
                            case 'accounts';
                                $table = nameSpcTwo\accounts::create();
                                $table->id = $id;
                                $table->email = $_POST['email'];
                                $table->fname = $_POST['fname'];
                                $table->lname = $_POST['lname'];
                                $table->phone = $_POST['phone'];
                                $table->birthday = $_POST['birthday'];
                                $table->gender = $_POST['gender'];
                                $table->password = $_POST['password'];
                                break;
                            case 'todos';
                                $table = nameSpcTwo\todos::create();
                                $table->id = $id;
                                $table->owneremail = $_POST['owneremail'];
                                $table->ownerid = $_POST['ownerid'];
                                $table->createddate = $_POST['createddate'];
                                $table->duedate = $_POST['duedate'];
                                $table->message = $_POST['message'];
                                $table->isdone = $_POST['isdone'];
                                break;
                        }
                        $result = $table->save();
                    } else {
                        $result = htmlTags::changeRow('Please input an ID');
                    }
                    break;
            }
            return $result;
        }
        static public function getID ($method) {
            if ($method != 'findAll') {
                return $_POST['id'];
            } else {
                return null;
            }
        }
        static public function outputErrorMassage () {
            global $connErr;
            global $sqlErr;
            if (!empty($connErr)) {
                $output = $connErr;
                $connErr = '';
                return $output;
            } elseif (!empty($sqlErr)) {
                $output = $sqlErr;
                $sqlErr = '';
                return $output;
            } else {
                $output = '';
                return $output;
            }
        }
    }
?>