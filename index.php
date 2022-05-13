<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Manager</title>
</head>
<body>
    <form action="replace.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="file" required />
        <input type="text" name="nftID" id="nftID" oninput="changeNFTimg()" placeholder="NFT ID">
        <button type="submit" name="submit">REPLACE</button>
    </form>
    <div id="nftImage">
    <img src="https://thetributeclub.com/image/1.gif" alt="NFT image">
    </div>
    <script>
        function changeNFTimg() {
            var nftId = document.getElementById("nftID").value;
            document.getElementById("nftImage").innerHTML = `<img src="https://thetributeclub.com/image/${nftId}.gif">`
        }
    </script>
</body>
</html>