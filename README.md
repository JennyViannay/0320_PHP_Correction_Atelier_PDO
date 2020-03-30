# 0320_PHP_Correction_Atelier_PDO

## DATABASE

>
> CREATE DATABASE blog;
>
> USE blog;
>
> CREATE TABLE article(
> id INT PRIMARY KEY AUTO_INCREMENT NOT NULL,
> title VARCHAR(80),
> content TEXT,
> author VARCHAR(80));
>

## CRUD pour article :

index.php => get all articles // SELECT * FROM article; <br>
create.php => post one article // INSERT INTO article (title, content, author) VALUES (:title, :content, :author); <br>
edit.php => update on article // UPDATE artcile SET title=:title, content=:content, author=:author; <br>
delete.php => delete on article // DELETE FROM article WHERE id=:id; 
