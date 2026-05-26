function hcKpdEkleSatir() {
    var tbody = document.querySelector('#hc-kpd-table tbody');
    var tr = document.createElement('tr');
    tr.innerHTML = '<td><input type="text" class="hc-kpd-ad" placeholder="Varlık" style="margin:0;"></td>' +
                   '<td><input type="number" class="hc-kpd-miktar" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><input type="number" class="hc-kpd-fiyat" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><button type="button" class="hc-btn-danger" onclick="hcKpdSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>';
    tbody.appendChild(tr);
}

function hcKpdSilSatir(btn) {
    var tr = btn.closest('tr');
    var tbody = tr.parentNode;
    if (tbody.rows.length > 1) {
        tr.remove();
    } else {
        alert('En az bir varlık satırı kalmalıdır.');
    }
}

function hcKpdHesapla() {
    var rows = document.querySelectorAll('#hc-kpd-table tbody tr');
    var assets = [];
    var toplamDeger = 0;

    for (var i = 0; i < rows.length; i++) {
        var ad = rows[i].querySelector('.hc-kpd-ad').value.trim() || ('Varlık ' + (i + 1));
        var miktar = parseFloat(rows[i].querySelector('.hc-kpd-miktar').value) || 0;
        var fiyat = parseFloat(rows[i].querySelector('.hc-kpd-fiyat').value) || 0;
        
        if (miktar > 0 && fiyat > 0) {
            var deger = miktar * fiyat;
            toplamDeger += deger;
            assets.push({ ad: ad, deger: deger });
        }
    }

    if (assets.length === 0) {
        alert('Lütfen en az bir geçerli miktar ve fiyat giriniz.');
        return;
    }

    var resTbody = document.getElementById('hc-kpd-res-tbody');
    resTbody.innerHTML = '';

    assets.forEach(function(asset) {
        var pay = (asset.deger / toplamDeger) * 100;
        var tr = document.createElement('tr');
        tr.innerHTML = '<td>' + asset.ad + '</td>' +
                       '<td>' + asset.deger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2}) + '</td>' +
                       '<td>%' + pay.toFixed(2) + '</td>';
        resTbody.appendChild(tr);
    });

    document.getElementById('hc-kpd-res-toplam').innerText = toplamDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-kpd-result').classList.add('visible');
}