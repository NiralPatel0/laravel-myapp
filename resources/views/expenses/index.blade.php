@extends('layouts.user')

@section('title', 'My Expenses')

@section('content')
<div class="container my-5">
    <div class="row">
        <div class="col-sm-6  mb-3 mb-sm-0">
            <h3 class="card-title fw-bolder mb-2">Welcome <span class="text-success">{{ ucfirst(Auth::user()->name)}}</span></h3>
            <p class="card-text">Add a new expenses </p>
        </div>
        <div class="col-sm-6 text-end">
            <span class="btn btn-success" data-bs-target="#addExpenses" data-bs-toggle="modal">Add Expenses</span>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card mt-4 shadow">
                <div class="card-body px-0">
                    @if($expenses && $expenses->count() > 0)
                    <div class="table-responsive">

                        <table class="table tab  mb-0">
                            <thead>
                                <tr>
                                    <td>Sr_No.</td>
                                    <td>Date</td>
                                    <td>Title</td>
                                    <td>Category</td>
                                    <td>Amount</td>
                                    <td>Payment_Method</td>
                                    <td>Notes</td>
                                    <td>
                                        Actions
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($expenses as $index => $expense)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $expense->date }}</td>
                                    <td>{{ $expense->title }}</td>
                                    <td>{{ $expense->category }}</td>
                                    <td>{{ $expense->amount }}</td>
                                    <td>{{ $expense->payment }}</td>
                                    <td>{{ $expense->notes }}</td>
                                    <td class="flex-nowrap d-flex">
                                        <!-- {{-- Edit --}} -->
                                        <!-- <a href=""
                                            class="btn btn-success btn-sm me-2">Edit</a> -->

                                        <button type="button" class="btn btn-success btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editExpenses{{ $expense->id }}">
                                            Edit
                                        </button>

                                        <!-- {{-- Delete --}} -->
                                        <form action="{{ route('expenses.destroy', $expense->id) }}"
                                            method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure you want to delete this expense?')">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @include('expenses.edit')
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                    <div class="p-2 text-center">
                        <p class="mb-0">Data Not Found</p>
                    </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</div>


@include('expenses.add-expenses')



@endsection