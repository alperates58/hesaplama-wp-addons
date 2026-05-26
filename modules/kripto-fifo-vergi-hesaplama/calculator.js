function hcFifoEkleSatir() {
    var tbody = document.querySelector('#hc-fifo-table tbody');
    var tr = document.createElement('tr');
    tr.innerHTML = '<td><select class="hc-fifo-tur" style="margin:0;"><option value="BUY">AL (BUY)</option><option value="SELL">SAT (SELL)</option></select></td>' +
                   '<td><input type="number" class="hc-fifo-miktar" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><input type="number" class="hc-fifo-fiyat" placeholder="0" step="any" min="0" style="margin:0;"></td>' +
                   '<td><button type="button" class="hc-btn-danger" onclick="hcFifoSilSatir(this)" style="padding:4px 8px; margin:0;">Sil</button></td>';
    tbody.appendChild(tr);
}

function hcFifoSilSatir(btn) {
    var tr = btn.closest('tr');
    var tbody = tr.parentNode;
    if (tbody.rows.length > 1) {
        tr.remove();
    } else {
        alert('En az bir işlem satırı kalmalıdır.');
    }
}

function hcFifoHesapla() {
    var rows = document.querySelectorAll('#hc-fifo-table tbody tr');
    var buys = [];
    var sells = [];

    for (var i = 0; i < rows.length; i++) {
        var tur = rows[i].querySelector('.hc-fifo-tur').value;
        var miktar = parseFloat(rows[i].querySelector('.hc-fifo-miktar').value) || 0;
        var fiyat = parseFloat(rows[i].querySelector('.hc-fifo-fiyat').value) || 0;

        if (miktar <= 0 || fiyat <= 0) continue;

        if (tur === 'BUY') {
            buys.push({ miktar: miktar, fiyat: fiyat });
        } else {
            sells.push({ miktar: miktar, fiyat: fiyat });
        }
    }

    if (buys.length === 0 || sells.length === 0) {
        alert('Lütfen en az bir AL ve bir SAT işlemi giriniz.');
        return;
    }

    var totalSalesVolume = 0;
    var matchedCost = 0;
    var buyIndex = 0;

    sells.forEach(function(sell) {
        var remainingSell = sell.miktar;
        totalSalesVolume += (sell.miktar * sell.fiyat);

        while (remainingSell > 0 && buyIndex < buys.length) {
            var currentBuy = buys[buyIndex];
            if (currentBuy.miktar <= 0) {
                buyIndex++;
                continue;
            }

            var matchQuantity = Math.min(remainingSell, currentBuy.miktar);
            matchedCost += (matchQuantity * currentBuy.fiyat);
            
            currentBuy.miktar -= matchQuantity;
            remainingSell -= matchQuantity;

            if (currentBuy.miktar <= 0) {
                buyIndex++;
            }
        }
    });

    var profit = totalSalesVolume - matchedCost;
    var tax = profit > 0 ? profit * 0.20 : 0; // %20 varsayılan vergi oranı

    document.getElementById('hc-fifo-res-satis').innerText = totalSalesVolume.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    document.getElementById('hc-fifo-res-maliyet').innerText = matchedCost.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    
    var profitEl = document.getElementById('hc-fifo-res-kazanc');
    profitEl.innerText = (profit >= 0 ? '+' : '') + profit.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});
    profitEl.style.color = profit >= 0 ? 'var(--hc-front-green)' : 'var(--hc-front-red)';

    document.getElementById('hc-fifo-res-vergi').innerText = tax.toLocaleString('tr-TR', {minimumFractionDigits: 2, maximumFractionDigits: 2});

    document.getElementById('hc-fifo-result').classList.add('visible');
}