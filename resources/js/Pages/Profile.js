import React from "react";
import Authenticated from "@/Layouts/Authenticated";
import { Header } from "@/Components";

const Profile = (props) => {
  return (
    <Authenticated
      auth={props.auth}
      errors={props.errors}
      header={
        <h2 className="font-semibold text-xl text-gray-800 leading-tight">
          Dashboard
        </h2>
      }
    >
      <Header title='Your page title' description="Your page description" />
      <div className="py-12">
        <div className="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div className="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div className="p-6 bg-white border-b border-gray-200">
            Profile
            </div>
          </div>
        </div>
      </div>
    </Authenticated>
  );
}

export default Profile;
