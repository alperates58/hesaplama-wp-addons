function hcDcaEkleSatir() {
    var tbody = document.querySelector('#hc-dca-table tbody');
    var tr = document.createElement('tr');
    tr.innerHTML = '<td><input type="number" class="hc-dca-tutar" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><input type="number" class="hc-dca-fiyat" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><button type="button" class="hc-btn-danger" onclick="hcDcaSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>';
    tbody.appendChild(tr);
}

function hcDcaSilSatir(btn) {
    var tr = btn.closest('tr');
    var tbody = tr.parentNode;
    if (tbody.rows.length > 1) {
        tr.remove();
    } else {
        alert('En az bir satır kalmalıdır.');
    }
}

function hcDcaHesapla() {
    var rows = document.querySelectorAll('#hc-dca-table tbody tr');
    var toplamYatirim = 0;
    var toplamCoin = 0;

    for (var i = 0; i < rows.length; i++) {
        var tutar = parseFloat(rows[i].querySelector('.hc-dca-tutar').value) || 0;
        var fiyat = parseFloat(rows[i].querySelector('.hc-dca-fiyat').value) || 0;
        
        if (tutar > 0 && fiyat > 0) {
            toplamYatirim += tutar;
            toplamCoin += (tutar / fiyat);
        }
    }

    if (toplamYatirim <= 0) {
        alert('Lütfen geçerli alım verileri giriniz.');
        return;
    }

    var ortalama = toplamYatirim / toplamCoin;

    document.getElementById('hc-dca-res-toplam-yatirim').innerText = toplamYatirim.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-dca-res-toplam-coin').innerText = toplamCoin.toLocaleString('tr-TR', {maximumFractionDigits: 8});
    document.getElementById('hc-dca-res-ortalama').innerText = ortalama.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-dca-result').classList.add('visible');
}