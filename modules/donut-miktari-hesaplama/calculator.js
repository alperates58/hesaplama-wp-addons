function hcDonutQtyHesapla() {
    const people = parseInt(document.getElementById('hc-dq-people').value) || 0;
    
    // Kişi başı ortalama 1.5 donut
    const count = Math.ceil(people * 1.5);
    const boxes = Math.ceil(count / 12);

    document.getElementById('hc-res-dq-count').innerText = count + ' Adet';
    document.getElementById('hc-res-dq-boxes').innerText = boxes + ' Kutu';
    
    document.getElementById('hc-donut-qty-result').classList.add('visible');
}
