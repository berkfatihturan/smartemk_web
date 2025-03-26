const paginationNumbers = document.getElementById("pagination-numbers");
const paginatedList = document.getElementById("table");
const listName = ".table-item:not([style*='display: none'])"
const listItems = paginatedList.querySelectorAll(listName);
const nextButton = document.getElementById("next-button");
const prevButton = document.getElementById("prev-button");

const nextMore = document.getElementById("next-more");
const prevMore = document.getElementById("prev-more");

let paginationLimit = 10;
let pageCount = Math.ceil(listItems.length / paginationLimit);
let currentPage = 1;

function changePaginationLimit(limitValue = 0) {
    paginationLimit = limitValue;
    pageCount = Math.ceil(listItems.length / paginationLimit);
}

function changeCurrentPage(pageNum = 0) {
    currentPage = pageNum;
}


const disableButton = (button) => {
    button.classList.add("disabled");
    button.setAttribute("disabled", true);
};

const enableButton = (button) => {
    button.classList.remove("disabled");
    button.removeAttribute("disabled");
};

const handlePageButtonsStatus = () => {
    const listItems = paginatedList.querySelectorAll(listName);
    const pageCount = Math.ceil(listItems.length / paginationLimit);
    if (currentPage === 1) {
        disableButton(prevButton);
        prevButton.style.display = "none"
    } else {
        prevButton.style.display = ""
        enableButton(prevButton);
    }
    if (currentPage + 3 < pageCount) {
        nextMore.style.display = ""
    } else {
        nextMore.style.display = "none"
    }

    if (4 < currentPage) {
        prevMore.style.display = ""
    } else {
        prevMore.style.display = "none"
    }

    if (pageCount === currentPage) {
        disableButton(nextButton);
        nextButton.style.display = "none"
    } else {
        nextButton.style.display = ""
        enableButton(nextButton);
    }
};

const handleActivePageNumber = () => {
    const listItems = paginatedList.querySelectorAll(listName);
    const pageCount = Math.ceil(listItems.length / paginationLimit);

    document.querySelectorAll(".pagination-number").forEach((button) => {
        button.classList.remove("active");
        const pageIndex = Number(button.getAttribute("page-index"));
        if (pageIndex === currentPage) {
            button.classList.add("active");
        }

        if (currentPage - 4 < pageIndex && pageIndex < currentPage + 4 && pageIndex <= pageCount) {
            button.style.display = ""
        } else {
            button.style.display = "none"
        }
    });
};

const appendPageNumber = (index) => {
    const pageNumber = document.createElement("button");
    pageNumber.className = "pagination-number page-link";
    pageNumber.innerHTML = index;
    pageNumber.setAttribute("page-index", index);
    pageNumber.setAttribute("aria-label", "Page " + index);

    const parentLi = document.createElement("li");
    parentLi.className = "page-item";
    parentLi.appendChild(pageNumber);


    paginationNumbers.appendChild(parentLi);
};

const getPaginationNumbers = () => {
    const listItems = paginatedList.querySelectorAll(listName);
    pageCount = Math.ceil(listItems.length / paginationLimit);
    for (let i = 1; i <= pageCount; i++) {
        appendPageNumber(i);
    }
};

const setCurrentPage = (pageNum) => {
    currentPage = pageNum;
    const listItems = paginatedList.querySelectorAll(listName);
    handleActivePageNumber();
    handlePageButtonsStatus();

    const prevRange = (pageNum - 1) * paginationLimit;
    const currRange = pageNum * paginationLimit;

    listItems.forEach((item, index) => {
        item.classList.add("hidden");
        if (index >= prevRange && index < currRange) {
            item.classList.remove("hidden");
        }
    });
};

function startPaged() {
    getPaginationNumbers();
    setCurrentPage(currentPage);

    prevButton.addEventListener("click", () => {
        setCurrentPage(currentPage - 1);
    });

    nextButton.addEventListener("click", () => {
        setCurrentPage(currentPage + 1);
    });

    document.querySelectorAll(".pagination-number").forEach((button) => {
        const pageIndex = Number(button.getAttribute("page-index"));

        if (pageIndex) {
            button.addEventListener("click", () => {
                setCurrentPage(pageIndex);
            });
        }
    });
}

function restartPaged() {
    return new Promise((resolve, reject) => {
        const element = document.getElementById('pagination-numbers');
        element.innerHTML = "";
        startPaged()
        setCurrentPage(1);
        resolve()
    });
}

window.addEventListener("load", () => {
    startPaged();
});
