function hcTsHesapla() {
    const depth = parseFloat(document.getElementById('hc-ts-depth').value);

    if (isNaN(depth)) {
        alert('Lütfen diş derinliğini girin.');
        return;
    }

    let status = "";
    let color = "";
    let desc = "";

    if (depth <= 1.6) {
        status = "TEHLİKE: Yasal Sınır Altı";
        color = "#e74c3c";
        desc = "Lastikleriniz yasal sınır olan 1.6 mm'nin altında veya sınırda. Derhal değiştirilmelidir. Sürüş güvenliği ciddi risk altındadır.";
    } else if (depth < 3) {
        status = "DİKKAT: Düşük Seviye";
        color = "#e67e22";
        desc = "Lastik diş derinliği azalmış. Islak zeminde performans ciddi oranda düşer. En kısa sürede değişim planlanmalıdır.";
    } else if (depth < 4) {
        status = "ORTA";
        color = "#f1c40f";
        desc = "Lastikleriniz orta seviyede. Kış ayları yaklaşıyorsa 4 mm altı kış performansı için yetersiz kalabilir.";
    } else {
        status = "GÜVENLİ / İYİ";
        color = "#2ecc71";
        desc = "Lastik diş derinliğiniz güvenli aralıkta. Yeni lastikler genellikle 8 mm derinliğindedir.";
    }

    const stEl = document.getElementById('hc-ts-status');
    stEl.innerText = status;
    stEl.style.color = color;
    document.getElementById('hc-ts-desc').innerText = desc;
    document.getElementById('hc-ts-result').classList.add('visible');
}
