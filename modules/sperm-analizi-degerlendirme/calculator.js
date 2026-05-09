function hcSpermAnaliziHesapla() {
    var hacim = parseFloat(document.getElementById('hc-sperm-hacim').value);
    var kons = parseFloat(document.getElementById('hc-sperm-kons').value);
    var hareket = parseFloat(document.getElementById('hc-sperm-hareket').value);
    var morfo = parseFloat(document.getElementById('hc-sperm-morfo').value);

    if (isNaN(hacim) || isNaN(kons) || isNaN(hareket) || isNaN(morfo)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    var kriterler = {
        hacim: hacim >= 1.4,
        kons: kons >= 16,
        hareket: hareket >= 42,
        morfo: morfo >= 4
    };

    var sonuc = "";
    var yorum = "";
    var statusClass = "";

    if (kriterler.hacim && kriterler.kons && kriterler.hareket && kriterler.morfo) {
        sonuc = "Normozoospermi";
        yorum = "Tüm temel parametreler WHO alt limitlerinin üzerindedir. Sperm analizi normal olarak değerlendirilebilir.";
        statusClass = "normal";
    } else {
        sonuc = "Anormal Bulgular";
        var eksikler = [];
        if (!kriterler.hacim) eksikler.push("Düşük hacim (Hipospermi)");
        if (!kriterler.kons) eksikler.push("Düşük konsantrasyon (Oligozoospermi)");
        if (!kriterler.hareket) eksikler.push("Düşük hareketlilik (Astenozoospermi)");
        if (!kriterler.morfo) eksikler.push("Düşük morfoloji (Teratozoospermi)");
        
        yorum = "Şu alanlarda alt limitlerin altında değerler tespit edildi: " + eksikler.join(", ") + ".";
        statusClass = "danger";
    }

    var resDiv = document.getElementById('hc-sperm-result');
    var statusDiv = document.getElementById('hc-sperm-status');
    var yorumDiv = document.getElementById('hc-sperm-yorum');

    statusDiv.textContent = sonuc;
    statusDiv.className = "hc-result-value " + statusClass;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
