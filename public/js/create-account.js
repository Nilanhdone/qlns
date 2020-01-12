// Education History add
$("#addNewEduHis").click(function() {
    $("#newEduHis").append(`@include('account.create.education')`);

    $("#educationHistoryForm").find(".eduForm").length > 3 ? $("#removeEduHis").css("display", "inline") : $("#removeEduHis").css("display", "none");
});

// Education History remove
$("#removeEduHis").click(function() {
    $("form .eduForm").last().remove();

    $("#educationHistoryForm").find(".eduForm").length > 3 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Training History add
$("#addNewTrainHis").click(function() {
    $("#newTrainHis").append(`@include('account.create.training')`);

    $("#trainingHistoryForm").find(".trainingForm").length > 0 ? $("#removeTrainHis").css("display", "inline") : $("#removeTrainHis").css("display", "none");
});

// Training History remove
$("#removeTrainHis").click(function() {
    $("form .trainingForm").last().remove();
    $("form .trainingForm").last().remove();

    $("#trainingHistoryForm").find(".trainingForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});

// Company History add
$("#addNewComHis").click(function() {
    $("#newComHis").append(`@include('account.create.company')`);

    $("#companyHistoryForm").find(".companyForm").length > 0 ? $("#removeComHis").css("display", "inline") : $("#removeComHis").css("display", "none");
});

// Company History remove
$("#removeComHis").click(function() {
    $("form .companyForm").last().remove();
    $("form .companyForm").last().remove();

    $("#trainingHistoryForm").find(".companyForm").length > 0 ? $(this).css("display", "inline") : $(this).css("display", "none");
});
