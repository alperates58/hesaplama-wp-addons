function hcTiklamaOraniHesapla() {
    const clicks = parseFloat(document.getElementById('hc-to-clicks').value);
    const impressions = parseFloat(document.getElementById('hc-to-impressions').value);

    if (isNaN(clicks) || isNaN(impressions) || impressions <= 0) {
        alert('Lütfen geçerli tıklama ve gösterim sayılarını girin.');
        return;
    }

    const ctr = (clicks / impressions) * 100;
    const valueElem = document.getElementById('hc-to-value');
    const commentElem = document.getElementById('hc-to-comment');

    valueElem.innerText = '%' + ctr.toLocaleString('tr-TR', { minimumFractionDigits: 2, maximumFractionDigits: 2 });
    
    let comment = "";
    if (ctr < 0.5) comment = "Düşük tıklama oranı. Reklam görseli veya başlığı ilgi çekici olmayabilir.";
    else if (ctr < 2) comment = "Ortalama bir tıklama oranı. Sektöre göre değişkenlik gösterebilir.";
    else if (ctr < 5) comment = "İyi bir tıklama oranı. Hedef kitle reklamla ilgili.";
    else comment = "Mükemmel tıklama oranı! Reklamınız oldukça başarılı.";

    commentElem.innerText = comment;
    document.getElementById('hc-to-result').classList.add('visible');
}
