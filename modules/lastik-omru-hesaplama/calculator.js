function hcTlHesapla() {
    const dot = document.getElementById('hc-tl-dot').value;
    if (dot.length !== 4 || isNaN(dot)) {
        alert('Lütfen 4 haneli DOT kodunu girin (Örn: 1222).');
        return;
    }

    const week = parseInt(dot.substring(0, 2));
    const year = 2000 + parseInt(dot.substring(2, 4));

    if (week < 1 || week > 53) {
        alert('Geçersiz hafta bilgisi.');
        return;
    }

    const now = new Date();
    const prodDate = new Date(year, 0, 1 + (week - 1) * 7);
    const diffYears = (now - prodDate) / (1000 * 60 * 60 * 24 * 365.25);

    let status = "";
    let color = "";
    let desc = "";

    if (diffYears < 0) {
        status = "Geçersiz Tarih";
        color = "#e74c3c";
        desc = "Gelecek bir tarih girilemez.";
    } else if (diffYears < 5) {
        status = "Güvenli";
        color = "#2ecc71";
        desc = "Lastikleriniz nispeten yeni. Diş derinliğini de kontrol etmeyi unutmayın.";
    } else if (diffYears < 10) {
        status = "Dikkat";
        color = "#f1c40f";
        desc = "Lastikleriniz 5 yaşından büyük. Yakından takip edilmeli ve çatlak kontrolü yapılmalıdır.";
    } else {
        status = "Tehlikeli / Ömrü Dolmuş";
        color = "#e74c3c";
        desc = "10 yaşından büyük lastiklerin kullanımı diş derinliği ne olursa olsun güvenlik riski taşır. Değiştirilmesi önerilir.";
    }

    const resBox = document.getElementById('hc-tl-status');
    resBox.innerText = status;
    resBox.style.color = color;
    document.getElementById('hc-tl-desc').innerText = desc;
    document.getElementById('hc-tl-result').classList.add('visible');
}
