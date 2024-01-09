<!-- article_list.php -->
<?php 
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/global/dbprod.php"); /* db연결설정 파일 포함. */
include_once ($_SERVER['DOCUMENT_ROOT']."/inc/head.php"); /* html 여는 파일 */

        $stmt = $db->prepare("SELECT * FROM `article` ORDER BY id DESC"); // article엔티티를 조회하는 쿼리 작성
        $stmt->execute(); // 쿼리 실행

        echo "
            <table style=\"border:solid 1px; width:1000px; text-align:center;\">
                <th style=\"border:solid 1px; width:60px;\">글번호</th>
                <th style=\"border:solid 1px; width:300px;\">제목</th>
                <th style=\"border:solid 1px; width:180px;\">작성일</th>
                <th style=\"border:solid 1px; width:180px;\">수정일</th>
                <th style=\"border:solid 1px; width:100px;\">작성자</th>
            </table>
            ";
        foreach( $stmt->fetchAll(PDO::FETCH_ASSOC) as $row ) { // PDO를 이용하여 조회된 엔티티의 칼럼명으로 변수에 값을 할당하여 foreach 반복문으로 출력
            $id = $row["id"];
            $title = $row["title"];
            $body = $row["body"];
            $author = $row["author"];
            $createDate = $row["createDate"];
            $modifyDate = $row["modifyDate"];
            if (!$modifyDate) {
                $modifyDate = "-";
            }
            

            echo "
            <table style=\"border:solid 1px; width:1000px; text-align:center;\">
                <tr style=\"border:solid 1px; \">
                    <td style=\"border:solid 1px; width:60px;\">".$id."</td>
                    <td style=\"border:solid 1px; width:300px;\">".$title."</td>
                    <td style=\"border:solid 1px; width:180px;\">".$createDate."</td>
                    <td style=\"border:solid 1px; width:180px;\">".$modifyDate."</td>
                    <td style=\"border:solid 1px; width:100px;\">".$author."</td>
                </tr>
            </table>
            ";
        }


        $result = $stmt->fetchAll(); // list 용
        // view 용 :: $stmt->fetch();
        // print_r($result);

include_once ($_SERVER['DOCUMENT_ROOT']."/inc/tail.php"); /* html 닫는 파일 */ 
?> 