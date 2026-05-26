function hcColEkle() {
    var container = document.getElementById('hc-ktd-items-container');
    var div = document.createElement('div');
    div.className = 'hc-ktd-row';
    div.style = 'display:flex; gap:8px; margin-bottom:12px; align-items:center;';
    div.innerHTML = '<input type="text" placeholder="Öğe Adı" class="hc-ktd-name" style="flex:2;">' +
                    '<input type="number" placeholder="Adet" class="hc-ktd-qty" style="flex:1;" min="1" value="1">' +
                    '<input type="number" placeholder="Alış Fiyatı" class="hc-ktd-buy" style="flex:1.2;" min="0">' +
                    '<input type="number" placeholder="Güncel Fiyat" class="hc-ktd-val" style="flex:1.2;" min="0">' +
                    '<button class="hc-btn" style="background:#ef4444; width:auto; padding:8px 12px;" onclick="hcColSil(this)">Sil</button>';
    container.appendChild(div);
}

function hcColSil(btn) {
    btn.parentElement.remove();
}

function hcColDegerHesapla() {
    var names = document.getElementsByClassName('hc-ktd-name');
    var qtys = document.getElementsByClassName('hc-ktd-qty');
    var buys = document.getElementsByClassName('hc-ktd-buy');
    var vals = document.getElementsByClassName('hc-ktd-val');

    var toplamAdet = 0;
    var toplamMaliyet = 0;
    var toplamDeger = 0;

    for (var i = 0; i < qtys.length; i++) {
        var qty = parseFloat(qtys[i].value) || 0;
        var buy = parseFloat(buys[i].value) || 0;
        var val = parseFloat(vals[i].value) || 0;

        toplamAdet += qty;
        toplamMaliyet += qty * buy;
        toplamDeger += qty * val;
    }

    var netKar = toplamDeger - toplamMaliyet;
    var karOrani = toplamMaliyet > 0 ? (netKar / toplamMaliyet) * 100 : 0;

    document.getElementById('hc-ktd-res-adet').innerText = toplamAdet + ' adet';
    document.getElementById('hc-ktd-res-maliyet').innerText = toplamMaliyet.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
    document.getElementById('hc-ktd-res-deger').innerText = toplamDeger.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺';
    
    var netCell = document.getElementById('hc-ktd-res-net');
    netCell.innerText = netKar.toLocaleString('tr-TR', {minimumFractionDigits: 2}) + ' ₺ ( %' + (netKar >= 0 ? '+' : '') + karOrani.toFixed(1) + ' )';
    
    var netRow = document.getElementById('hc-ktd-res-net-row');
    if (netKar >= 0) {
        netRow.style.color = 'var(--hc-front-green)';
    } else {
        netRow.style.color = '#ef4444';
    }

    document.getElementById('hc-ktd-result').classList.add('visible');
}