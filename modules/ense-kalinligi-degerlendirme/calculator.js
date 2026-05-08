function hcEnseKalinligiHesapla() {
    var nt = parseFloat(document.getElementById('hc-nt-deger').value);
    var hafta = parseInt(document.getElementById('hc-nt-hafta').value);
    var yas = parseInt(document.getElementById('hc-nt-yas').value);

    if (isNaN(nt) || isNaN(yas)) {
        alert('Lütfen tüm alanları doldurun.');
        return;
    }

    var durum = "";
    var yorum = "";
    var statusClass = "";

    // Basit NT değerlendirme mantığı (Tıbbi genel kabuller)
    if (nt < 2.5) {
        durum = "Normal Sınırlar";
        yorum = "Ense kalınlığı ölçümü (NT) normal sınırlarda görünmektedir. Bu sonuç genellikle genetik bozukluk riskinin düşük olduğunu gösterir.";
        statusClass = "normal";
    } else if (nt >= 2.5 && nt < 3.5) {
        durum = "Sınırda (Gri Bölge)";
        yorum = "Ölçüm sınırda veya hafif artmış olarak değerlendirilebilir. Doktorunuz ikili tarama testi sonuçlarıyla birlikte kombine bir değerlendirme yapacaktır.";
        statusClass = "warning";
    } else {
        durum = "Artmış Ense Kalınlığı";
        yorum = "NT ölçümü 3.5 mm üzerinde olup 'artmış' kabul edilir. Bu durum genetik bozukluklar veya kalp anomalileri açısından artmış risk işaretidir. İleri tetkikler (CVS, Amniyosentez) gerekebilir.";
        statusClass = "danger";
    }

    if (yas >= 35) {
        yorum += " Anne yaşının 35 ve üzeri olması, NT ölçümünden bağımsız olarak genetik risk profilini etkiler.";
    }

    var resDiv = document.getElementById('hc-nt-result');
    var statusDiv = document.getElementById('hc-nt-status');
    var yorumDiv = document.getElementById('hc-nt-yorum');

    statusDiv.textContent = durum;
    statusDiv.className = "hc-result-value " + statusClass;
    yorumDiv.textContent = yorum;
    resDiv.classList.add('visible');
}
