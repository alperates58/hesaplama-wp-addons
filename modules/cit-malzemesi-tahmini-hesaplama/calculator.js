function hcCMTHesapla() {
    const len = parseFloat(document.getElementById('hc-cmt-len').value);
    const spacing = parseFloat(document.getElementById('hc-cmt-spacing').value);
    const type = document.getElementById('hc-cmt-type').value;

    if (isNaN(len) || len <= 0 || isNaN(spacing) || spacing <= 0) {
        alert('Lütfen geçerli değerler giriniz.');
        return;
    }

    const posts = Math.ceil(len / spacing) + 1;
    let mainText = "";

    if (type === 'panel') {
        const panels = Math.ceil(len / 2.5);
        mainText = panels + ' Adet Panel';
    } else if (type === 'tel') {
        const rolls = Math.ceil(len / 20);
        mainText = rolls + ' Top Tel';
    } else {
        mainText = len.toLocaleString('tr-TR') + ' m Malzeme';
    }

    const betonBags = Math.ceil(posts * 20 / 25); // 25kg bags

    document.getElementById('hc-cmt-posts').innerText = posts + ' Adet';
    document.getElementById('hc-cmt-main').innerText = mainText;
    document.getElementById('hc-cmt-beton').innerText = betonBags + ' Torba';
    
    document.getElementById('hc-cmt-result').classList.add('visible');
}
