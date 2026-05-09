function hcTestHataHesapla() {
    const lmpVal = document.getElementById('hc-te-lmp').value;
    const testVal = document.getElementById('hc-te-test').value;
    const cycle = parseInt(document.getElementById('hc-te-cycle').value);

    if (!lmpVal || !testVal) {
        alert('Lütfen tarihleri seçin.');
        return;
    }

    const lmp = new Date(lmpVal);
    const test = new Date(testVal);
    const diffDays = Math.floor((test - lmp) / (24 * 60 * 60 * 1000));

    const status = document.getElementById('hc-te-status');
    const desc = document.getElementById('hc-te-desc');

    if (diffDays < (cycle - 4)) {
        status.innerText = "ÇOK YÜKSEK HATA RİSKİ";
        status.style.backgroundColor = "#ffebee"; status.style.color = "#c62828";
        desc.innerText = "Test çok erken yapılmış. Negatif sonuç çıksa bile hamile olma ihtimaliniz yüksektir. Lütfen adet gecikmesini bekleyin.";
    } else if (diffDays < cycle) {
        status.innerText = "ORTA DERECE HATA RİSKİ";
        status.style.backgroundColor = "#fffde7"; status.style.color = "#fbc02d";
        desc.innerText = "Adet gününden hemen önce yapılan testler bazen doğru sonuç vermeyebilir. Negatif sonuç durumunda 2-3 gün sonra testi tekrarlayın.";
    } else if (diffDays < (cycle + 7)) {
        status.innerText = "DÜŞÜK HATA RİSKİ";
        status.style.backgroundColor = "#e8f5e9"; status.style.color = "#2e7d32";
        desc.innerText = "Adet gecikmesi yaşanmış. Bu aşamada alınan sonuçlar genellikle güvenilirdir.";
    } else {
        status.innerText = "ÇOK DÜŞÜK HATA RİSKİ";
        status.style.backgroundColor = "#e3f2fd"; status.style.color = "#1976d2";
        desc.innerText = "Adet gecikmesinin üzerinden 1 hafta geçmiş. Testin hata payı yok denecek kadar azdır.";
    }

    document.getElementById('hc-test-error-result').classList.add('visible');
}
