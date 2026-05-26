function hcKomEkleSatir() {
    var tbody = document.querySelector('#hc-kom-table tbody');
    var tr = document.createElement('tr');
    tr.innerHTML = '<td><input type="number" class="hc-kom-fiyat" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><input type="number" class="hc-kom-miktar" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><button type="button" class="hc-btn-danger" onclick="hcKomSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>';
    tbody.appendChild(tr);
}

function hcKomSilSatir(btn) {
    var tr = btn.closest('tr');
    var tbody = tr.parentNode;
    if (tbody.rows.length > 1) {
        tr.remove();
    } else {
        alert('En az bir alım satırı kalmalıdır.');
    }
}

function hcKomHesapla() {
    var rows = document.querySelectorAll('#hc-kom-table tbody tr');
    var toplamMiktar = 0;
    var toplamTutar = 0;

    for (var i = 0; i < rows.length; i++) {
        var fiyat = parseFloat(rows[i].querySelector('.hc-kom-fiyat').value) || 0;
        var miktar = parseFloat(rows[i].querySelector('.hc-kom-miktar').value) || 0;
        
        if (fiyat > 0 && miktar > 0) {
            toplamMiktar += miktar;
            toplamTutar += (fiyat * miktar);
        }
    }

    if (toplamMiktar <= 0) {
        alert('Lütfen geçerli alım verileri giriniz.');
        return;
    }

    var ortalama = toplamTutar / toplamMiktar;

    document.getElementById('hc-kom-res-miktar').innerText = toplamMiktar.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-kom-res-tutar').innerText = toplamTutar.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-kom-res-ortalama').innerText = ortalama.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-kom-result').classList.add('visible');
}