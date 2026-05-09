function hcKolOranHesapla() {
    var total = parseFloat(document.getElementById('hc-kor-total').value);
    var ldl = parseFloat(document.getElementById('hc-kor-ldl').value);
    var hdl = parseFloat(document.getElementById('hc-kor-hdl').value);

    if (isNaN(total) || isNaN(ldl) || isNaN(hdl) || hdl === 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    var totalHdl = (total / hdl).toFixed(2);
    var ldlHdl = (ldl / hdl).toFixed(2);

    var resDiv = document.getElementById('hc-kor-result');
    var statusDiv = document.getElementById('hc-kor-status');
    var detayDiv = document.getElementById('hc-kor-detay');

    statusDiv.textContent = "T/H: " + totalHdl + " | L/H: " + ldlHdl;
    
    var yorum = "";
    if (totalHdl < 5 && ldlHdl < 3.5) {
        yorum = "Oranlarınız normal sınırlar içindedir. Kalp ve damar hastalığı riskiniz düşük görünmektedir.";
        statusDiv.className = "hc-result-value normal";
    } else {
        yorum = "Oranlarınız yüksek çıkmıştır. Bu durum kalp damar sağlığı açısından artmış risk teşkil edebilir. Doktorunuza danışınız.";
        statusDiv.className = "hc-result-value danger";
    }

    detayDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
