function hcSatGebelikHesapla() {
    var satInput = document.getElementById('hc-sat-tarih').value;
    if (!satInput) {
        alert('Lütfen bir tarih seçin.');
        return;
    }

    var sat = new Date(satInput);
    var today = new Date();
    
    var diffTime = today - sat;
    var diffDays = Math.floor(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 0 || diffDays > 300) {
        alert('Lütfen geçerli bir gebelik tarihi girin.');
        return;
    }

    var hafta = Math.floor(diffDays / 7);
    var gun = diffDays % 7;

    // Önemli tarihler (Milestones)
    var edd = new Date(sat); edd.setDate(sat.getDate() + 280);
    var firstTri = new Date(sat); firstTri.setDate(sat.getDate() + 91);
    var secondTri = new Date(sat); secondTri.setDate(sat.getDate() + 189);

    var resDiv = document.getElementById('hc-sat-result');
    var haftaDiv = document.getElementById('hc-sat-hafta');
    var detayDiv = document.getElementById('hc-sat-detay');
    var mileList = document.getElementById('hc-sat-milestones');

    haftaDiv.textContent = hafta + " Hafta " + gun + " Günlük";
    detayDiv.textContent = "Tahmini doğum tarihiniz: " + edd.toLocaleDateString('tr-TR');
    
    mileList.innerHTML = "";
    var items = [
        "1. Trimester Bitişi: " + firstTri.toLocaleDateString('tr-TR'),
        "2. Trimester Bitişi: " + secondTri.toLocaleDateString('tr-TR'),
        "Yolun Yarısı (20. Hafta): " + new Date(sat.getTime() + (20 * 7 * 24 * 60 * 60 * 1000)).toLocaleDateString('tr-TR')
    ];

    items.forEach(function(txt) {
        var li = document.createElement('li');
        li.textContent = txt;
        mileList.appendChild(li);
    });

    resDiv.classList.add('visible');
}
