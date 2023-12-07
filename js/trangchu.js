// <!-- script cho bộ lọc -->
var x, i, j, l, ll, selElmnt, a, b, c;
/*tìm kiếm bất kì phần tử nào có lớp "custon-select"*/
x = document.getElementsByClassName("custom-select");
l = x.length;
for (i = 0; i < l; i++) {
    selElmnt = x[i].getElementsByTagName("select")[0];
    ll = selElmnt.length;
    /*đối với mỗi phần tử, tạo 1 DIV mới đóng vai trò là mục đã chọn*/
    a = document.createElement("DIV");
    a.setAttribute("class", "select-selected");
    a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
    x[i].appendChild(a);
    /*đối với mỗi phần tử, tạo 1 DIV mới chứa danh sách tùy chọn*/
    b = document.createElement("DIV");
    b.setAttribute("class", "select-items select-hide");
    for (j = 1; j < ll; j++) {
        /*cho mỗi tùy chọn trong phần tử chọn ban đầu, tạo 1 div mới sẽ oạt động như 1 tùy chọn*/
        c = document.createElement("DIV");
        c.innerHTML = selElmnt.options[j].innerHTML;
        c.addEventListener("click", function (e) {
            /*khi 1 mục dc nhấp vài, hãy cập nhật hộp chọn ban đầy và mục đã chọn*/
            var y, i, k, s, h, sl, yl;
            s =
                this.parentNode.parentNode.getElementsByTagName("select")[0];
            sl = s.length;
            h = this.parentNode.previousSibling;
            for (i = 0; i < sl; i++) {
                if (s.options[i].innerHTML == this.innerHTML) {
                    s.selectedIndex = i;
                    h.innerHTML = this.innerHTML;
                    y =
                        this.parentNode.getElementsByClassName(
                            "same-as-selected"
                        );
                    yl = y.length;
                    for (k = 0; k < yl; k++) {
                        y[k].removeAttribute("class");
                    }
                    this.setAttribute("class", "same-as-selected");
                    break;
                }
            }
            h.click();
        });
        b.appendChild(c);
    }
    x[i].appendChild(b);
    a.addEventListener("click", function (e) {
        /*khi 1 hộp chọn dc đóng vào, hãy đóng mọi hộp khác, và mở/đóng hộp chọn hiện tại*/
        e.stopPropagation();
        closeAllSelect(this);
        this.nextSibling.classList.toggle("select-hide");
        this.classList.toggle("select-arrow-active");
    });
}

function closeAllSelect(elmnt) {
    /*1 hàm sẽ đóng tất cả các hộp chọn trong tài liệu, ngoại trừ hộp chọn hiện tại*/
    var x,
        y,
        i,
        xl,
        yl,
        arrNo = [];
    x = document.getElementsByClassName("select-items");
    y = document.getElementsByClassName("select-selected");
    xl = x.length;
    yl = y.length;
    for (i = 0; i < yl; i++) {
        if (elmnt == y[i]) {
            arrNo.push(i);
        } else {
            y[i].classList.remove("select-arrow-active");
        }
    }
    for (i = 0; i < xl; i++) {
        if (arrNo.indexOf(i)) {
            x[i].classList.add("select-hide");
        }
    }
}
/*nếu người dùng nhấp vào bất cứ nơi nào bên ngoài hộp chọn, đóng tất cả các hộp chọn*/
document.addEventListener("click", closeAllSelect);
