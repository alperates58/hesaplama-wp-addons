function hcSafetyHesapla() {
    const intrinsic = parseFloat(document.getElementById('hc-sm-intrinsic').value);
    const price = parseFloat(document.getElementById('hc-sm-price').value);

    if (isNaN(intrinsic) || isNaN(price) || intrinsic <= 0) {
        alert('Lütfen geçerli değerler girin.');
        return;
    }

    const margin = ((intrinsic - price) / intrinsic) * 100;

    document.getElementById('hc-sm-res-total').innerText = '%' + margin.toLocaleString('tr-TR', { minimumFractionDigits: 2 });
    
    const commentElem = document.getElementById('hc-sm-comment');
    if (margin >= 30) {
        commentElem.innerText = "Yüksek Güvenlik: Fiyat içsel değerin oldukça altında, emniyetli bir alım bölgesi.";
    } else if (margin > 0) {
        commentElem.innerText = "Düşük Güvenlik: Fiyat içsel değere yakın, marj dar.";
    } else {
        commentElem.innerText = "Negatif Marj: Piyasa fiyatı içsel değerin üzerinde (aşırı değerli).";
    }

    document.getElementById('hc-sm-result').classList.add('visible');
}
